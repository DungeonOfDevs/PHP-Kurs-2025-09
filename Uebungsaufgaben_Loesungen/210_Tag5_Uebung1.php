<?php

/*
 * Kopfrechnen
 *
 * Schreibe ein Programm, das dem Benutzer fünf Rechenaufgaben stellt.
 *
 * Welche Operatoren (+, -, *, %, /, **) jeweils benutzt werden,
 * soll per Zufall ermittelt werden.
 * Jede Zahl und jedes Ergebnis der Rechenaufgaben muss eine ganze,
 * positive Zahl unter hundert sein.
 *
 * Wenn der Benutzer seine Ergebnisse absendet,
 * soll ausgegeben werden, wie viele Ergebnisse richtig waren
 * und wie lange der Benutzer gebraucht hat.
 */

session_start();

function random_task(): array {
    $ops = ['+', '-', '*', '%', '/', '**'];
    while (true) {
        $op = $ops[array_rand($ops)];

        // Standardbereiche
        $a = rand(1, 99);
        $b = rand(1, 99);

        switch ($op) {
            case '+':
                // a + b < 100
                $a = rand(1, 98);
                $b = rand(1, 99 - $a);
                $res = $a + $b;
                break;

            case '-':
                // a - b ∈ [1..99]  => a > b, Ergebnis < 100
                $b = rand(1, 98);
                $a = rand($b + 1, 99);
                $res = $a - $b;
                if ($res <= 0 || $res >= 100) continue 2;
                break;

            case '*':
                // a * b < 100
                $a = rand(1, 99);
                $maxB = intdiv(99, $a);
                if ($maxB < 1) continue 2;
                $b = rand(1, $maxB);
                $res = $a * $b;
                if ($res <= 0 || $res >= 100) continue 2;
                break;

            case '/':
                // Ganzzahlige Division: wähle Ergebnis r (1..99), wähle b, setze a = r*b, alles < 100
                $r = rand(1, 99);
                $maxB = intdiv(99, $r);
                if ($maxB < 1) continue 2;
                $b = rand(1, $maxB);
                $a = $r * $b;
                $res = $r; // a / b = r
                if ($a < 1 || $a >= 100 || $b < 1 || $b >= 100 || $res < 1 || $res >= 100) continue 2;
                break;

            case '%':
                // Ergebnis = a % b ∈ [1..99], also != 0. Dazu b >= 2 und a nicht vielfaches von b.
                $b = rand(2, 99);
                // wähle a in 1..99 aber nicht vielfaches von b
                $tries = 0;
                do {
                    $a = rand(1, 99);
                    $r = $a % $b;
                    $tries++;
                    if ($tries > 200) continue 3; // Neustart mit anderer Op, falls unglücklich
                } while ($r === 0 || $r >= 100);
                $res = $r;
                break;

            case '**':
                // a ** b < 100, beide >=1. Praktisch sinnvolle Paare:
                // 2**2=4, 2**3=8, 2**4=16, 2**5=32, 2**6=64
                // 3**2=9, 3**3=27, 3**4=81
                // 4**2=16, 4**3=64
                // 5**2=25, 6**2=36, 7**2=49, 8**2=64, 9**2=81
                $candidates = [];
                for ($base = 2; $base <= 9; $base++) {
                    for ($exp = 2; $exp <= 6; $exp++) {
                        $val = $base ** $exp;
                        if ($val > 0 && $val < 100) {
                            $candidates[] = [$base, $exp, $val];
                        }
                    }
                }
                if (!$candidates) continue 2;
                [$a, $b, $res] = $candidates[array_rand($candidates)];
                break;

            default:
                continue 2;
        }

        // Sicherheitscheck
        if ($a >= 1 && $a < 100 && $b >= 1 && $b < 100 && $res >= 1 && $res < 100) {
            return ['a' => $a, 'op' => $op, 'b' => $b, 'res' => $res];
        }
    }
}

function generate_tasks(int $n = 5): array {
    $tasks = [];
    while (count($tasks) < $n) {
        $t = random_task();
        // Optional: Duplikate vermeiden
        $key = "{$t['a']}{$t['op']}{$t['b']}";
        if (!isset($seen[$key])) {
            $tasks[] = $t;
            $seen[$key] = true;
        }
    }
    return $tasks;
}

// Routing: Neues Quiz starten oder Auswertung?
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['tasks'], $_SESSION['started_at'])) {
    $tasks = $_SESSION['tasks'];
    $started = $_SESSION['started_at'];
    $elapsed = max(0, time() - $started);

    $correct = 0;
    $details = [];

    foreach ($tasks as $i => $t) {
        $field = "ans_$i";
        $user = isset($_POST[$field]) ? trim($_POST[$field]) : '';
        $isInt = (string)(int)$user === $user || (is_numeric($user) && floor((float)$user) == (float)$user);
        $userInt = $isInt ? (int)$user : null;

        $ok = ($userInt !== null && $userInt === (int)$t['res']);
        if ($ok) $correct++;

        $details[] = [
            'q' => "{$t['a']} {$t['op']} {$t['b']}",
            'expected' => $t['res'],
            'given' => $user,
            'ok' => $ok,
        ];
    }

    // Session für neues Spiel löschen
    unset($_SESSION['tasks'], $_SESSION['started_at']);

    // Ergebnis anzeigen
    ?>
    <!doctype html>
    <html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Kopfrechnen – Ergebnis</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body { font-family: system-ui, Arial, sans-serif; margin: 2rem; }
            .ok { color: green; }
            .bad { color: #b00020; }
            table { border-collapse: collapse; width: 100%; max-width: 700px; }
            th, td { border: 1px solid #ddd; padding: .6rem; text-align: left; }
            th { background: #f6f6f6; }
            .summary { margin: 1rem 0; font-size: 1.1rem; }
            .btn { display: inline-block; margin-top: 1rem; padding: .6rem 1rem; border: 1px solid #444; text-decoration: none; }
        </style>
    </head>
    <body>
    <h1>Ergebnis</h1>
    <p class="summary">Richtig: <strong><?php echo $correct; ?>/<?php echo count($details); ?></strong> &middot;
        Zeit: <strong><?php echo $elapsed; ?>s</strong></p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Aufgabe</th>
            <th>Deine Antwort</th>
            <th>Erwartet</th>
            <th>Richtig?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($details as $i => $d): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo htmlspecialchars($d['q']); ?></td>
                <td><?php echo htmlspecialchars((string)$d['given']); ?></td>
                <td><?php echo (int)$d['expected']; ?></td>
                <td class="<?php echo $d['ok'] ? 'ok' : 'bad'; ?>">
                    <?php echo $d['ok'] ? '✓' : '✗'; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <a class="btn" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Neues Quiz starten</a>
    </body>
    </html>
    <?php
    exit;
}

// Neues Quiz erzeugen
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = generate_tasks(5);
    $_SESSION['started_at'] = time();
}
$tasks = $_SESSION['tasks'];
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Kopfrechnen – Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: system-ui, Arial, sans-serif; margin: 2rem; }
        form { max-width: 700px; }
        .row { display: flex; align-items: center; gap: .6rem; margin: .6rem 0; }
        .task { width: 14ch; }
        input[type="number"] { width: 10ch; padding: .4rem; }
        .btn { margin-top: 1rem; padding: .6rem 1rem; border: 1px solid #444; background: #fafafa; cursor: pointer; }
        .meta { color: #555; margin-bottom: 1rem; }
    </style>
</head>
<body>
<h1>Kopfrechnen</h1>
<p class="meta">Es gibt 5 Aufgaben. Alle Zahlen und Ergebnisse sind ganze, positive Zahlen < 100.</p>

<form method="post">
    <?php foreach ($tasks as $i => $t): ?>
        <div class="row">
            <div class="task">
                <?php echo "{$t['a']} {$t['op']} {$t['b']} ="; ?>
            </div>
            <label for="ans_<?php echo $i; ?>" class="visually-hidden">Antwort <?php echo $i+1; ?></label>
            <input id="ans_<?php echo $i; ?>" name="ans_<?php echo $i; ?>" type="number" min="1" max="99" required>
        </div>
    <?php endforeach; ?>
    <button class="btn" type="submit">Abschicken & auswerten</button>
</form>

</body>
</html>
<?php

/* while-Schleife

Die while-Schleife wiederholt einen Codeblock so lange, wie die Bedingung wahr ist.
👉 Sie prüft die Bedingung vor jedem Durchlauf.

while (Bedingung) {
    // Anweisungen
}
 */

# Kopfgesteuerte Schleife

$i = 1;
while ($i <= 10) {
    echo $i . ' ';
    $i++;
}
echo '<br>';

/*
🔎 Ablauf:
    - Start: $i = 1 → Bedingung wahr → Ausgabe Zahl: 1
    - $i = 2 → Ausgabe Zahl: 2
    - …
    - $i = 11 → Bedingung falsch → Schleife stoppt
 */


# Die Stärke von while:
# Die Anzahl der Durchläufe ist nicht bekannt
# Solange keine 6 gewürfelt wird, gibt 'Bäh' aus.

while (rand(1, 6) !=6) {
    echo 'Bäh! ';
}

/*
Erklärung:
    1. rand(1, 6)
        – erzeugt eine Zufallszahl zwischen 1 und 6 (wie ein Würfelwurf).
    2. != 6
        – bedeutet: solange die Zahl nicht 6 ist.
    3. while (...) { ... }
        – führt den Code in den { } aus, solange die Bedingung stimmt.
    4. echo "Bäh! ";
        – gibt den Text „Bäh! “ aus.

🔎 Ablauf in Worten:
1. Es wird so lange zufällig gewürfelt, bis endlich eine 6 kommt.
2. Jedes Mal, wenn keine 6 kommt, steht auf dem Bildschirm: „Bäh! “
3. Sobald eine 6 gewürfelt wird → Bedingung ist falsch → Schleife hört auf.
 */

/* do…while-Schleife (Fußgesteuerte Schleife)

Die do…while-Schleife ist fast gleich wie die while-Schleife, aber:
Sie führt den Codeblock mindestens einmal aus, auch wenn die Bedingung von Anfang an falsch ist.

do {
    // Anweisungen
} while (Bedingung);

🔎 Unterschied zur while-Schleife:
- Bei while wird die Bedingung zuerst geprüft.
- Bei do…while wird erst der Code ausgeführt und danach die Bedingung geprüft.
*/

do {
    $wurf = rand(1, 6);  // würfelt eine Zahl von 1 bis 6
    echo $wurf. ' ';     // gibt die gewürfelte Zahl aus
} while ($wurf != 6);    // wiederhole so lange, bis eine 6 kommt

/*
Erklärung:
    1. do { ... } while (...) = Der Code im Block wird mindestens einmal ausgeführt.
    2. rand(1, 6) = erzeugt eine Zufallszahl zwischen 1 und 6 (wie ein Würfel).
    3. Jede Zahl wird direkt ausgegeben.
    4. Die Schleife läuft so lange, bis eine 6 gewürfelt wird.
    5. Sobald die 6 fällt → Bedingung $wurf != 6 ist falsch → Schleife stoppt.
 */
?php

// reguire_once bindet die angegebene Datei an genau der Stelle im Quellcode ein.
require_once 'lib/db_verbindung.php';

$stmt = $db->query('SELECT * FROM filme;');
$filme = $stmt->fetchAll();
// var_dump($filme);

var_dump($filme[0]);  // array(9)

// echo $filme[0]['titel'];  // Equalizer

$headings = array_keys($filme[0]);
// Spaltenüberschriften entfernen:
//unset($headings[0]);  // In PHP werden Arrays nicht neu indiziert
unset($headings[8]);
// var_dump($headings);

foreach ($headings as $k => $v) {
if ($v == 'fsk') $v = strtoupper($v);
$headings[$k] = $v;
}
$headings = array_map('ucfirst', $headings);

foreach ($filme as $key => $film) {
// unset($film['id']);     // Inhalte entfernen
unset($film['cover']);  // Inhalte entfernen
$filme[$key] = $film;
}

?>

<!-- TODO: Fsk -> FSK -->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Filme anzeigen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Filme anzeigen</h1>

<table>

    <tr>
        <?php foreach ($headings as $heading) { ?>
            <th>
                <?php echo $heading; ?>
            </th>
        <?php } ?>
    </tr>

    <?php foreach ($filme as $film) { ?>

        <tr onclick="location.href='film_anzeigen.php?id=<?php echo $film['id']; ?>'">
            <?php foreach ($film as $f) { ?>

                <td>
                    <?php echo $f; ?>
                </td>

            <?php } ?>
        </tr>

    <?php } ?>



</table>



</body>
</html>
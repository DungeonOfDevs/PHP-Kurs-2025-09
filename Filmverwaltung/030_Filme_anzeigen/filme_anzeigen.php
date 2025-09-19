<?php

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$db = new PDO('mysql:host=localhost;dbname=filmverwaltung', 'root', "", $options);

$stmt = $db->query('SELECT * FROM filme;');
$filme = $stmt->fetchAll();
# var_dump($filme);

# var_dump($filme[0]); # array(9)

# echo $filme[0]['titel'];    # Equalizer

# Spaltenüberschriften entfernen
$headings = array_keys($filme[0]);
# TODO: ID-Heading raus
# unset($headings[0]);
# TODO: Cover raus
unset($headings[8]);

# var_dump($headings);

$headings = array_map('ucfirst', $headings); // Anfangsbuchstaben sind jetzt groß ucfirst = erster Buchstabe

# TODO: FSK groß schreiben
# 6. Element in Großbuchstaben umwandeln (Index beachten: Array beginnt bei 0)
if (isset($headings[5])) {
    $headings[5] = strtoupper($headings[5]);    // strtoupper() → macht alle Buchstaben groß
}

# TODO: ID nicht anzeigen lassen für User
foreach($filme as $key =>  $film) {
    # unset($film['id']);
    # TODO: Cover nicht anzeigen lassen für User
    unset($film['cover']);
    $filme[$key] = $film; # IDs sind weg aber heading ID noch da, muss an andere Stelle nachgearbeitet werden
};

?>



<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Filme anzeigen</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<h1>Filme anzeigen</h1>

<table>
    <tr>
        <?php foreach($headings as $heading) {?>
        <th><?php echo $heading; ?></th>
        <?php } ?>
    </tr>

    <?php foreach($filme as $film) {?>
    <tr onclick="location.href='film_anzeigen.php?id=<?php echo $film['id']; ?>'">
        <?php foreach ($film as $f) { ?>

        <td>
            <?php echo $f; ?>
        </td>
        <?php }?>

    </tr>
    <?php }?>
</table>



</body>
</html>

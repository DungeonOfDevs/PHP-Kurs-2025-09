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

$headings = array_keys($filme[0]);
# var_dump($headings);

$headings = array_map('ucfirst', $headings); // Anfangsbuchstaben sind jetzt groß ucfirst = erster Buchstabe

# ID nicht anzeigen lassen für User
foreach($filme as $key =>  $film) {
    unset($film['id']);
    $filme[$key] = $film;           # IDs sind weg aber heading ID noch da, muss an andere Stelle nachgearbeitet werden
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
    <tr>
        <?php foreach ($film as $f) { ?>

        <td>
            <?php echo $f; ?>
        </td>
        <?php }?>

    </tr>
    <?php }?>
</table>

<!-- TODO: ID-Heading raus, Fsk -> FSK -->

</body>
</html>

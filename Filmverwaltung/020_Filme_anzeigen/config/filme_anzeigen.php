<?php

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$db = new PDO('mysql:host=localhost;dbname=filmverwaltung', 'root', "", $options);

$stmt = $db->query('SELECT * FROM filme;');
$filme = $stmt->fetchAll();
# var_dump($filme);

var_dump($filme[0]); # array(9)

echo $filme[0]['titel'];    # Equalizer

$headings = array_keys($filme[0]);
var_dump($headings);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Filme anzeigen</title>
</head>
<body>

<h1>Filme anzeigen</h1>


</body>
</html>

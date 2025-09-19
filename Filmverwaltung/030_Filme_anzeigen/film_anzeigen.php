<?php

# Datenbankverbindung herstellen( wie in
$options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$db = new PDO('mysql:host=localhost;dbname=filmverwaltung', 'root', "", $options);

var_dump($_GET);

echo $_GET['id'];

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Film anzeigen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Film anzeigen</h1>

</body>
</html>


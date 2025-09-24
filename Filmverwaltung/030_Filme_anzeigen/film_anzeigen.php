<?php

require_once 'lib/db_verbindung.php';

// var_dump($_GET);
// echo $_GET['id'];

// SELECT * FROM filme WHERE id=3;
// $stmt = $db->query('SELECT * FROM filme WHERE id=3;');
$stmt = $db->query("SELECT * FROM filme WHERE id={$_GET['id']};");
$film = $stmt->fetch();
$film['cover'] = '<img src="cover/' . $film['cover'] . '">';

var_dump($film);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Film anzeigen</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img {
            width: 200px;
        }
    </style>
</head>
<body>
<h1>Film anzeigen</h1>

<table>
    <?php foreach ($film as $k => $v) { ?>
        <tr>
            <th>
                <?php echo $k; ?>
            </th>
            <td>
                <?php echo $v; ?>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>


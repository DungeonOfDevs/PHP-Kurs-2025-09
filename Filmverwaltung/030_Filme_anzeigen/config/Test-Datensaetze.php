<?php

// https://www.php.net/manual/en/pdo.setattribute.php
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$db = new PDO('mysql:host=localhost;dbname=filmverwaltung', 'root', "", $options);
// $db = new PDO('mysql:host=localhost;dbname=filmverwaltung', 'root', "");

$db->query('TRUNCATE TABLE filme;');

$db->query("INSERT INTO filme VALUES
(1, 'Equalizer', 2014, 'Action', 'Sony Pictures', 16, 192.3, 132, 'equalizer.jpg'),
(2, 'Inception', 2010, 'Science Fiction', 'Warner Bros.', 12, 829.89, 148, 'inception.jpg'),
(3, 'The Dark Knight', 2008, 'Action', 'Warner Bros.', 16, 1004.93, 152, 'dark_knight.jpg'),
(4, 'Titanic', 1997, 'Drama/Romance', 'Paramount Pictures', 12, 2187.46, 195, 'titanic.jpg'),
(5, 'The Matrix', 1999, 'Science Fiction', 'Warner Bros.', 16, 466.36, 136, 'matrix.png'),
(6, 'Avatar', 2009, 'Science Fiction', '20th Century Fox', 12, 2923.71, 162, 'avatar.jpg'),
(7, 'Gladiator', 2000, 'Historical Drama', 'DreamWorks', 16, 503.18, 155, 'gladiator.jpg'),
(8, 'Jurassic Park', 1993, 'Adventure', 'Universal Pictures', 12, 1045.69, 127, 'jurassic_park.jpg'),
(9, 'The Godfather', 1972, 'Crime/Drama', 'Paramount Pictures', 16, 250.34, 175, 'godfather.jpg'),
(10, 'Interstellar', 2014, 'Science Fiction', 'Paramount Pictures', 12, 774.15, 169, 'interstellar.jpg'),
(11, 'Frozen', 2013, 'Animation/Musical', 'Walt Disney', 6, 1280.00, 102, 'frozen.jpg');");

$db->query("INSERT INTO filme VALUES (12, 'The Rock', 1996, 'Action', 'Bruckheimer Films & Hollywood Pictures', 16, 335, 136, 'rock.jpg');");

$db->query("INSERT INTO filme VALUES (13, 'The Little Things', 2021, 'Krimi', 'Warner Bros. Pictures', 16, 30.8, 128, 'little_things.jpg');");
$db->query("INSERT INTO filme VALUES (14, 'Idiocracy', 2006, 'Dokumentation', '20th Century Fox', 16, 0.5, 84, 'idiocracy.png');");

$db->query("INSERT INTO filme VALUES (15, 'The Darkest Hour', 2011, 'Science Fiction', 'Sony Pictures', 12, 150.85, 89, 'darkest_hour.jpg');");

// PDOStatement-Objekt erzeugen
$stmt = $db->query('SELECT * FROM filme;');
var_dump($stmt);

// Per fetchAll() alle Datensätze holen.
$filme = $stmt->fetchAll();

var_dump($filme);




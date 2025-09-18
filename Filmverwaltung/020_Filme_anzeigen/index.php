<?php

# PDO - PHP Data Objects

$db = new PDO('mysql:host=localhost:8080; dbname=mysql', 'root', "");
var_dump($db);

$db->query('CREATE DATABASE filmverwaltung;');

$db->query('DROP DATABASE IF EXISTS filmverwaltung;');
$db->query('CREATE DATABASE filmverwaltung;');
$db->query('USE filmverwaltung;');

$db->query('CREATE TABLE filme (    
    id INT PRIMARY KEY AUTO_INCREMENT,
    titel VARCHAR(255), 
    jahr YEAR, 
    genre VARCHAR(255), 
    vertrieb VARCHAR(255),
    FSK INT,    
    einspielergebnis BIGINT, 
    laenge INT, 
    cover VARCHAR(255));');

$statment = $db->query('SHOW COLUMNS FROM filme;');
var_dump($statment);

$spalten = $statment->fetchAll();
var_dump($spalten);
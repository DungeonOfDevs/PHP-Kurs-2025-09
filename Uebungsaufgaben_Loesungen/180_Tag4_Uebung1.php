<?php

/*
 * Obst oder Gemüse
 *
 * Fülle EIN (nummerisches, eindimensionales) Array
 * mit Apfel, Birne, Kartoffel, Karotte und Banane.
 * Lies per Zufall ein Element des Arrays aus
 * und gib an, ob es sich um Obst oder Gemüse handelt.
 *
 * Hilfsmittel: array, rand(), switch-case
 *
 * Zusatz 1: Die Reihenfolge im Array soll beliebig veränderbar sein
 * Zusatz 2: Die Wörter Obst & Gemüse sollen im Quellcode
 *           nur je einmal benutzen.
 *           Wenn die beiden Wörter in einer Variablen gespeichert werden,
 *           darf auch diese nur an einer Stelle ausgegeben oder zugewiesen werden.
 */

$lebensmittel = ["Apfel", "Birne", "Kartoffel", "Karotte", "Banane"];

// Wörter nur einmal definieren
$arten = [
    "obst"   => "Obst",
    "gemuese"=> "Gemüse"
];

// Zufallsauswahl
$zufallIndex = rand(0, count($lebensmittel) - 1);
$zufallWort  = $lebensmittel[$zufallIndex];

// Kategorie bestimmen it switch-case
switch ($zufallWort) {
    case "Apfel":
    case "Birne":
    case "Banane":
        $art = $arten["obst"];
        break;

    case "Kartoffel":
    case "Karotte":
    $art = $arten["gemuese"];
        break;

    default:
        $art = "Unbekannt";
}

// Kategorie bestimmen mit match
/* $art = match ($zufallWort) {
    "Apfel", "Birne", "Banane" => $arten["obst"],
    "Kartoffel", "Karotte" => $arten["gemuese"],
    default => "Unbekannt",
};
*/

echo $zufallWort . " ist " . $art . ".";
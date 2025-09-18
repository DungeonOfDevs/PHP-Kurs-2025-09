<?php

/*
 * Reiseziele
 *
 * Fülle ein Array mit deinen fünf Lieblingsreisezielen
 * und gib diese durchnummeriert aus.
 *
 * Hilfsmittel: Array, foreach
 */

$reiseziele = [
    "Japan",
    "Malediven",
    "Kanada",
    "Neuseeland",
    "Italien"
];

$nummer = 1;
foreach ($reiseziele as $ziel) {
    echo $nummer . ". " . htmlspecialchars($ziel, ENT_QUOTES, 'UTF-8') . "<br>";
    $nummer++;
}
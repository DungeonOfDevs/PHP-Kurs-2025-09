<?php
/*
 * Kleinste von drei Zahlen
 *
 * Schreibe ein Programm,
 * das drei Variablen mit zufälligen Zahlen befüllt.
 * Dann soll das Programm testen,
 * welcher Zahlenwert der kleinste ist und diesen ausgeben.
 *
 * Hilfsmittel: rand(), if-elseif-else
 */

# Drei Variablen mit zufälligen Zahlen befüllen
$zahl1 = rand(1,100);
$zahl2 = rand(1,100);
$zahl3 = rand(1,100);

# echo 'Zahlen: '.$zahl1. ' ' . $zahl2. ' ' . $zahl3. "\n";

# Vergleichen mit if-elseif-else
if ($zahl1 <= $zahl2 && $zahl1 <= $zahl3) {
    echo "Die kleinste Zahl ist Zahl 1: $zahl1";
}elseif ($zahl2 <= $zahl1 && $zahl2 <= $zahl3) {
    echo "Die kleinste Zahl ist Zahl 2: $zahl2";
}else {
    echo "Die kleinste Zahl ist Zahl 3: $zahl3";
}

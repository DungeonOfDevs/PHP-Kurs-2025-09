<?php

# Datentypen

// Zeichenketten
print gettype('Hello World!'); // String
print '<br>';

// Ganzzahlen
echo gettype(123456);   // Integer
echo '<br>';

// Fließkommazahlen
echo gettype(123.456);
echo '<br>';

// Unterstrich als Tausendertrenner
echo 123_456.789_123;   // 123456.789123
echo '<br>';

// Wahrheitswert
echo gettype(true); //boolean
echo '<br>';

echo gettype(false); //boolean
echo '<br>';

// NULL Wert
echo gettype(NULL);
echo '<br>';

// Identisch-Operatoren ===
// Testet die Werte UND den Datentyp
echo 123 == '123';  // 1
echo '<br>';

var_dump(123 == '123'); // boolean(true)
echo '<br>';

var_dump(123 === '123');

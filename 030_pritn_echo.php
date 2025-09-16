<?php

// print & echo sind beides sprachliche Konstrukte


// Zeichenketten (Strings) müssen durch Anführungsstriche('' oder "") eingegrenzt sein.

// Nur bei Doppelten "" schaut der Interpreter in den String -> \n wird akzeptiert

// Bei einfachen '' Anführungszeichen wird der Inhalt einfach ausgegeben.
// Bei Doppelten "" wird der Inhalt abgearbeitet:
// Steuerungszeichen werden erkannt und Variablen durch ihren Inhalt ersetzt.


// Wenn ich bei "\n" <br> vom HTML einfüge, wird mir das so auch im Broweser angezeigt, als untereinander
print 'Hello';
print "\n<br>";
echo 'Hello World!';
echo "\n<br>";

// $ zeigt an das, das folgende eine Variable ist
$var = 'Victoria';
echo $var;
echo "\n<br>";

echo 'Hello $var';
echo "\n<br>";
echo "Hello $var";
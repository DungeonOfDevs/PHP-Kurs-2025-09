<?php
/*
* Schreibe ein Programm, das per for-Schleife
* alle Zahlen von 1 bis 20 addiert
* und danach das Endergebnis ausgibt.
*/
$ergebnis = 0;

for($v = 1; $v <= 20; $v++){
    $ergebnis += $v;
}

echo $ergebnis; # sollte 210 sein
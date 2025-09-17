<?php
/*
* Schreibe ein Programm, das mit EINER for-Schleife
* alle natürlichen Zahlen von 1 bis 39 sowie 61 bis 100
* (jeweils einschließlich) der Größe nach ausgibt.
* 1 2 3 4 ..... 36 37 38 39 61 62 63 64 ... 97 98 99 100
*/

for($x= 1; $x <= 100; $x++){
    if ($x >= 40 && $x <= 60) continue;
    echo $x. ' ';
}


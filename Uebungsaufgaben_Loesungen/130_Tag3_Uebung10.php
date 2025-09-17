<?php
/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 13 17 21 29 33 37 45
*/

for($m = 13; $m <= 45; $m += 4){
    if($m == 25 || $m == 41) continue;
    echo $m. ' ';
}
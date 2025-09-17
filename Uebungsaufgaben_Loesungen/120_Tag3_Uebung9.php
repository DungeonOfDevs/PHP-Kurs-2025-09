<?php
/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
    * 1 2 3 4 5 6 8 9 10
*/

for($u = 1; $u <=10; $u++){
    if($u == 7) continue;
    echo $u. ' ';
}
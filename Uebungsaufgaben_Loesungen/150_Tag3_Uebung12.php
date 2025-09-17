<?php
/*
* Schreibe EINE for-Schleife, die Folgendes ausgibt:
* 1 2 3 4 5 4 3 2 1
*/
for($b = 1; $b <=9; $b++){
    if($b <= 5){
        echo $b. ' ';
    }else {
        echo (10 - $b).' ';
    }
}
<?php
/*
* Würfeln
*
* Würfel eine Zahl (von 1 bis 6) und gib aus,
* was gewürfelt wurde:
* Super, eine 6!
* Immerhin noch eine 5!
* Das reicht nicht! (bei 1-4)
*
* Hilfsmittel: rand(), Verzweigung
*/

# Zufallszahl von 1 bis 6 erzeugen
$wuerfel = rand(1,6);

# echo "Es wurde eine $wuerfel geworfen.\n";

# Verzweigung

if ($wuerfel == 6){
    echo "Super, eine 6!";
}elseif ($wuerfel == 5){
    echo "Immerhin noch eine 5!";
}else {
    echo "Das reicht nicht!";
}
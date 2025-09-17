<?php

/* for-Schleife

Die for-Schleife in PHP wiederholt einen Codeblock so lange, bis eine bestimmte Bedingung nicht mehr erfüllt ist.
Sie eignet sich super, wenn man vorher weiß, wie oft etwas wiederholt werden soll.
*/

# Zahlenschleife
# (Initialisierung/ Startwert; Veränderung)

/*
Initialisierung

for (Startwert; Bedingung; Schritt) {
    // Anweisungen, die wiederholt werden
}

    -> Startwert → legt die Anfangszahl fest (z. B. $i = 1)
    -> Bedingung → sagt, wie lange die Schleife läuft (z. B. $i <= 5)
    -> Schritt → wie die Zählvariable verändert wird (z. B. $i++ bedeutet +1 pro Durchlauf)
*/

for($i = 1; $i <= 3; $i++) {
    echo 'Hello <br>';
}

# for (;;) {] <-> while (true)

for ($i = 1; $i <= 3; $i--) {
    echo $i. '<br>';
}
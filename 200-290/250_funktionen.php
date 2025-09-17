<?php

/* Funktionen

Eine Funktion ist ein Block von Code, dem du einen Namen gibst und den du immer wieder verwenden kannst.
Statt denselben Code mehrfach zu schreiben, packst du ihn in eine Funktion und rufst ihn bei Bedarf auf.


function nameDerFunktion($parameter1, $parameter2) {
    // Code, der ausgeführt wird
    return $ergebnis; // optional
}

    1. function → Schlüsselwort, um eine Funktion zu definieren
    2. Name → wie du die Funktion später aufrufst
    3. Parameter → Daten, die du der Funktion übergeben kannst (optional)
    4. return → Wert, den die Funktion zurückgibt (optional)

Warum brauche ich Funktionen?
    1. Um Code wiederzuverwenden (nicht immer neu schreiben).
    2. Um Code übersichtlicher zu machen.
    3. Um komplexe Programme in kleine Bausteine zu zerlegen.

Merksatz:
    Eine Funktion ist wie eine Maschine:
    1. Du gibst etwas hinein (Parameter)
    2. Die Maschine arbeitet
    3. Sie spuckt etwas aus (return)

*/

# Funktionsdefinition
function addiere($zahl1, $zahl2) {
    return $zahl1 + $zahl2;
}

# Funktionsaufruf mit Argumenten
echo addiere(4, 7). "\n"; # 11


function addiere2($zahl1, $zahl2=1) {
    return $zahl1 + $zahl2;
}

echo addiere2(6, 7);    # 13
echo "\n";
echo addiere2(4);     # 5


# Beispiel 1: Einfache Funktion

function hallo() {
    echo "Hallo Welt!\n";
}

hallo(); // Funktionsaufruf -> Ausgabe = Hallo Welt"


# Beispiel 2: Mit Parametern

function begruessung($name) {
    echo "Hallo, $name!\n";
}

begruessung("Vic");     # -> Ausgabe: Hallo, Vic!
begruessung("Sara");    # -> Ausgabe: Hallo, Sara!


# Beispiel 3: Mit Rückgabewert

function addiere3($a, $b) {
    return $a + $b;
}

$summe = addiere3(5, 7);
echo $summe; // 12

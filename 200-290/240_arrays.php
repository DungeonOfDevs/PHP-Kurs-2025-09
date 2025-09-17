<?php

# Arrays
# Ein Array ist eine Variable, in der du mehrere Werte speichern kannst – wie eine Liste oder eine Sammlung.

# Nummerische Array (in Python die Liste)
# Indiziertes Array → die Werte haben automatisch Zahlen als Schlüssel (0,1,2,…)

$leute = ['Peter', 'Paul', 'Mary'];

# echo $leute; // Array & WARNING = funktioniert so NICHT

# var_dump() Zur Information beim Programmieren:
# Variablen fallen lassen/ auskippen.
var_dump($leute);

echo $leute[0]. "\n";   # Peter
echo $leute[1]. "\n";   # Paul
echo $leute[2]. "\n";   # Mary


# Assoziatives Array → die Werte haben eigene Namen (Schlüssel/Wörter statt Zahlen)
# -> in Python Dictionary

# Schlüssel/Key - Wert/ Value - Paare
# Der Doppelpfeil steht zwischen Schlüssel und Wert.
$person = [
    "name" => "Vic",
    "alter" => 31,
    "stadt" => "Berlin"
];

// var_dump($person);
echo $person["name"]. "\n";  // Vic
echo $person["alter"]. "\n"; // 31
echo $person["stadt"]. "\n"; // Berlin

# count()
# Gibt die Anzahl der Indexe/ Keys zurück.
# Die Funktion count() gibt dir zurück, wie viele Elemente in einem Array (oder in einem „zählbaren“ Objekt) enthalten sind.

echo count($leute). "\n";   # 3
echo count($person). "\n";  # 3

/*
Wichtige Optionen
 -> count() hat einen 2. Parameter:

    count($array, COUNT_RECURSIVE);

Damit kannst du auch verschachtelte Elemente mitzählen.
*/

$data = [
    "a" => [1, 2],
    "b" => [3, 4]
];

echo count($data). "\n";                          // 2
echo count($data, COUNT_RECURSIVE). "\n";   // 6

/*Das ist ein assoziatives Array mit 2 Schlüsseln:

    1. Schlüssel "a" → enthält ein Array [1, 2]
    2. Schlüssel "b" → enthält ein Array [3, 4]

1️⃣Normales count($data)
Hier wird nur die oberste Ebene gezählt:
"a"
"b"
➡️ Ergebnis = 2

2️⃣ count($data, COUNT_RECURSIVE)

Jetzt wird rekursiv gezählt → also auch die Inhalte der Unter-Arrays.

    1. Oberste Ebene: "a", "b" → 2
    2. Unter-Array "a": 1, 2 → +2
    3. Unter-Array "b": 3, 4 → +2

👉 Gesamt: 2 + 2 + 2 = 6

🔎 Merksatz:
    -> count($array) → nur die „Fächer im Schrank“.
    -> count($array, COUNT_RECURSIVE) → alle Fächer und alles, was darin liegt.
*/

# foreach-Schleife (speziell für Arrays)

/*
Die foreach-Schleife ist eine spezielle Schleife in PHP, die zum Durchlaufen von Arrays oder Objekten verwendet wird.

Sie ist viel einfacher und übersichtlicher als for, wenn du nicht mit Indexzahlen arbeiten möchtest,
sondern direkt die Werte oder Schlüssel eines Arrays brauchst.
*/

foreach($leute as $leut){
    echo 'Hallo '. $leut. "\n";
}

/*Aufbau

Es gibt zwei Varianten:

1. Nur Werte durchlaufen

foreach ($array as $wert) {
    // benutze $wert
}


2. Schlüssel + Werte durchlaufen

foreach ($array as $schluessel => $wert) {
    // benutze $schluessel und $wert
}
 */

# Beispiel: Indiziertes Array

$fruits = ["Apfel", "Banane", "Kirsche"];

foreach ($fruits as $fruit) {
    echo $fruit . "\n";         # Ausgabe: Apfel / Banane / Kirsche
}


# Beispiel: Assoziatives Array
    $person = [
        "name" => "Vic",
        "alter" => 31,
        "stadt" => "Berlin"
    ];

foreach ($person as $key => $value) {   # key = Schlüssel und value = Werte
    echo $key . ": " . $value . "\n";
}

/*
Warum brauche ich foreach?

    1. Wenn du alle Elemente eines Arrays verarbeiten willst.
    2. Praktischer als for, weil du dich nicht um die Länge des Arrays (count()) oder die Indexnummern kümmern musst.
    3. Du kannst direkt über die Werte (und bei Bedarf über die Schlüssel) iterieren.

👉 Merksatz:
    -> for = gut, wenn du die Indexnummer brauchst.
    -> foreach = perfekt, wenn du nur mit den Array-Inhalten arbeiten möchtest.
*/
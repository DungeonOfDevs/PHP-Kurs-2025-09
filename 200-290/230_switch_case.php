<?php

/* switch case

In switch–case in PHP ist eine Alternative zu vielen if–elseif–Abfragen.
Man benutzt es, wenn man eine Variable auf mehrere mögliche Werte prüfen will.

switch ($variable) {
    case Wert1:
        // Code, wenn $variable == Wert1
        break;

    case Wert2:
        // Code, wenn $variable == Wert2
        break;

    default:
        // Code, wenn kein Fall passt
}

    1. switch ($variable) → die Variable, die geprüft wird

    2. case WertX: → was passiert, wenn die Variable genau diesen Wert hat

    3. break; → beendet den aktuellen Fall (sonst läuft es weiter in den nächsten Fall hinein)

    4. default: → Standardfall, falls nichts passt


switch:
    -> klassisch, schon lange in PHP
    -> braucht break; nach jedem Fall
    -> kann auch komplexere Sachen (z. B. mehrere Zeilen Code pro Fall)

*/

# In Python erst seit 3.10 als match case

$tag = rand(1,7);

# Variablenbezeichner: lowerCamelCase

switch ($tag) {
    case 1:
        echo 'Montag';
        break;
    case 2:
        echo 'Dienstag';
        break;
    case 3:
        echo 'Mittwoch';
        break;
    case 4:
        echo 'Donnerstag';
        break;
    case 5:
        echo 'Freitag';
        break;
    case 6:
        echo 'Samstag';
        break;
    case 7:
        echo 'Sonntag';
        break;
    default:
        echo 'FEHLER';
}

/*
if/else → gut für Bedingungen mit Vergleichen (<, >, ==, usw.)

switch → gut, wenn man eine Variable auf viele feste Werte prüfen will
 */

/* match

match ist ein neues Sprachkonstrukt seit PHP 8, das ähnlich wie switch funktioniert – aber moderner und kompakter.
Es prüft den Wert einer Variable und gibt direkt ein Ergebnis zurück.

match:
    -> match (neu ab PHP 8):
    -> Ausdruck, kein Statement → gibt direkt einen Wert zurück
    -> kein break nötig
    -> strikter Vergleich (=== statt ==)
    -> gut, wenn du nur einfache Werte zuordnen willst
*/
echo match ($tag) {
    1 => 'Montag',
    2 => 'Dienstag',
    3 => 'Mittwoch',
    4 => 'Donnerstag',
    5 => 'Freitag',
    6 => 'Samstag',
    7 => 'Sonntag',
    default => 'FEHLER',
};


/*
!!! Faustregel:
    1. switch → wenn du in den Fällen mehrzeiligen Code hast
    2. match → wenn du nur Werte zuordnen oder zurückgeben willst

 */
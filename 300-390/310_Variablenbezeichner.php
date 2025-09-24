<?php

# Variablenbezeichner

# Am Anfang muss in PHP das Dollar_Zeichen stehen.

# Danach sind Buchstaben, Ziffern und der Unterstrich erlaubt
# Einschränkung: Direkt nach dem Dollar-Zeichen keine Ziffer

$_hallo = 1;
$lowerCamelCase= 2; # Programmier Richtlinie

$HELLO = 3; # Funktioniert

# PHP ist (wie alle Programmiersprachen) case-sensitiv.
# echo $hello;    // Warning: Undefined variable $hello



# Geht nicht:
# Ziffer darf nicht am Anfang stehen:
# $1zahl = 1;   // Parse error: syntax error, unexpected integer *1*

# keine unerlaubten Sonderzeichen:
# $meine-variable = 12;   // Parse error: syntax...
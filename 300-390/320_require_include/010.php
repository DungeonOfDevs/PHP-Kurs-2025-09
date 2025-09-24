<?php

# require_once bindet eine Datei nur einmalig (once) ein.

require_once 'hello.php';
require_once 'hello.php';   // wird ignoriert

#  require bindet eine Datei jedes Mal neu ein.
require 'hello.php';
require 'hello.php';
require 'hello.php';
require 'hello.php';

# Bei require/require_once wird das Skript abgebrochen.
require 'hello_world.php';
echo 'Weiter geht es!';

# Bei include/ include_once gibt es nur eine Warning und das Skript wird weiter ausgeführt.
# Daher bindet man wichtige Sachen (z.B. DB-Verbindung) mit require ein
# und unwichtige Sachen (Layout-Element) mit include.
include 'hello_my_world.php';   // 'hello_my_world.php' ist nicht vorhanden
echo 'Weiter geht es!';

echo '<hr>';

# Die Endung ist frei wählbar.
include 'functions.inc.php';

echo addiere(3,4);
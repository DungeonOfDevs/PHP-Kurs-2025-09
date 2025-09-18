<?php

/*
 * Liebingslottozahlen
 *
 * Befülle ein Array mit deinen Liebingslottozahlen
 * und gib sie per foreach als HTML-Liste aus.
 */
$lieblingszahlen = [3, 7, 12, 19, 33, 45]; // Beispielwerte

echo "<ul>\n";
foreach ($lieblingszahlen as $zahl) {
    echo "<li>" . htmlspecialchars((string)$zahl, ENT_QUOTES, 'UTF-8') . "</li>\n";
}
echo "</ul>";
<?php

# continue

for ($i = 1; $i <= 5; $i++) {
    if ($i == 7) continue;  // Überspringt die 7
        echo $i . " ";     // 10 9 8 6 5 4 3 2 1
}

echo '<br>';

# Ohne geschweifte Klammer ist nur die nächste Anweisung im if


# break
# Beendet die ganze Schleife direkt

for ($i = 10; $i > 0; $i--) {
    if ($i == 7) break;
    echo $i . " ";      // 10 9 8
}
echo '<br>';

/*
break = „Stop, Schleife ganz beenden!“

continue = „Diesen Durchlauf überspringen, aber weitermachen.“
 */
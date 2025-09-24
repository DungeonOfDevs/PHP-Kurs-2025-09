<?php



// $headings[5] = 'FSK';
$headings[5] = strtoupper($headings[5]);


foreach ($headings as $key => $item) {
    $lower = strtolower($item);

    if ($lower === 'fsk') {
        $headings[$key] = strtoupper($item);
    } else {
        $headings[$key] = ucfirst($item);
    }
}


$headings = array_map(function($item) {
    // Alles lower schreiben
    $lower = strtolower($item);

    if ($lower === 'fsk') {
        // Wenn 'fsk', dann alles upper
        return strtoupper($item);
    } else {
        // nur ersten Buchstaben upper
        return ucfirst($item);
    }
}, $headings);


$headings = array_map(function($h){
    return $h === 'fsk' ? strtoupper($h) : ucfirst($h);
}, $headings);
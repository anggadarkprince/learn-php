<?php

$counter = 1;

// infinity loop
while (true) {
    echo "This is for while-$counter" . PHP_EOL;
    $counter++;

    // break from the loop
    if ($counter > 10) {
        break;
    }
}
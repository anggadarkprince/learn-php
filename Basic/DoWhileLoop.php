<?php

// do while at least executed "do" block once,
// then evaluate condition inside while to continue the loop
$counter = 100;
do {
    echo "This is while-{$counter}" . PHP_EOL;
    $counter++;
} while ($counter <= 10);
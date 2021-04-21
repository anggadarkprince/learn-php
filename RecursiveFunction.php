<?php

// create loop to multiply value from 1-n
function factorialLoop(int $value): int {
    $total = 1;

    for ($i = 1; $i <= $value; $i++) {
        $total *= $i;
    }

    return $total;
}

// test the result
var_dump(factorialLoop(5));
var_dump(1 * 2 * 3 * 4 * 5);

// using recursive: function that call the function itself
function factorialRecursive(int $value): int {
    if ($value == 1) {
        return 1;
    } else {
        return $value * factorialRecursive($value - 1);
    }
}

var_dump(factorialRecursive(5));

// be caution using recursive, it can produce memory overflow error
function loop(int $value) {
    if ($value == 0) {
        echo "End loop" . PHP_EOL;
    } else {
        echo "Loop-$value" . PHP_EOL;
        loop($value - 1);
    }
}
// it depends on your computer
loop(3000000);
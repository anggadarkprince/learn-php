<?php

function getEven(int $max): Iterator
{
    $array = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 0) {
            $array[] = $i;
        }
    }
    return new ArrayIterator($array);
}

foreach (getEven(100) as $value) {
    echo "Even : $value" . PHP_EOL;
}

function getOdd(int $max): Iterator
{
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 == 1) {
            yield $i;
        }
    }
}

foreach (getOdd(100) as $value) {
    echo "Odd : $value" . PHP_EOL;
}
<?php

$name = "Angga";

$otherName = &$name;

$otherName = "Ari";

echo $name . PHP_EOL;

// reference as param
function increment(int &$value) {
    $value++;
}

$counter = 1;
increment($counter);
// without return the value, the param affect any operation inside the function
echo $counter . PHP_EOL;

// reference as return value (rare in real-world cases)
function &getValue() {
    static $value = 100;
    return $value;
}

$a = &getValue();
$a = 200;

$b = &getValue();
echo $b . PHP_EOL;
<?php

$names = ["Angga", "Ari", "Wijaya"];

// common loop from for(initial value; condition; expresion that manipulated each loop)
for ($i = 0; $i < count($names); $i++) {
    echo "Data - {$i} = {$names[$i]}" . PHP_EOL;
}

// for each allow to extract key->val of indexed or associative array
foreach ($names as $index => $name) {
    echo "Data - {$index} = {$name}" . PHP_EOL;
}

// foreach without extract the key
foreach ($names as $name):
    echo "Data {$name}" . PHP_EOL;
endforeach;

// foreach with associative array
$person = [
    "first_name" => "Angga",
    "middle_name" => "Ari",
    "last_name" => "Wijaya",
    "age" => "27",
    "role" => "Programmer"
];
// extract key of array
foreach ($person as $key => $value) {
    echo "{$key} : {$value}" . PHP_EOL;
}
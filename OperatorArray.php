<?php

$first = [
    "first_name" => "Angga"
];

$last = [
    "first_name" => "Ari",
    "last_name" => "Wijaya"
];

// joining array keep first_name from first array, append the rest
$full = $first + $last;
var_dump($full);

$a = [
    "first_name" => "Angga",
    "last_name" => "Ari Wijaya"
];

$b = [
    "last_name" => "Angga",
    "first_name" => "Ari"
];

var_dump($a == $b);
var_dump($a === $b); // strict comparison: compare value and data type
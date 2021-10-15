<?php

function sayHello(string $first, string $last)
{

}

function sum(int... $values){
    var_dump(array_sum($values));
}

sayHello(
    "Eko",
    "Eko", // allowed to add a trailing comma in parameter
);

sum(
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1,
    1, // allowed trailing comma in last parameter
);

$array = [
    "first" => "Angga",
    "middle" => "Ari",
    "last" => "Wijaya",
    "address" => "Surabaya",
    "country" => "Indonesia",
    "bday" => "Eko", // allowed trailing comma in array
];
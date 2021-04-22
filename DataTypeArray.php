<?php

$values = array(10, 9, 8, 7.5);
var_dump($values);

$names = ["Angga", "Ari", "Wijaya"];
var_dump($names);

var_dump($names[0]);

$names[0] = "Anggi";
var_dump($names);

unset($names[1]);
var_dump($names);

$names[] = "Aryo";
var_dump($names);

var_dump(count($names));

$angga = [
    "id" => 1,
    "name" => "Angga Ari Wijaya",
    "age" => 30,
    "address" => [
        "city" => "Surabaya",
        "country" => "Indonesia"
    ]
];
var_dump($angga);

var_dump($angga["name"]);
var_dump($angga["address"]["country"]);

$budi = [
    "id" => "budi",
    "name" => "Budi Nugraha",
    "age" => 35,
    "address" => [
        "city" => "Jakarta",
        "country" => "Indonesia"
    ]
];
var_dump($budi);
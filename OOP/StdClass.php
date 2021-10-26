<?php

$array = [
    "firstName" => "Angga",
    "middleName" => "Ari",
    "lastName" => "Wijaya"
];
// convert to stdClass
$object = (object)$array;

var_dump($object);

echo "First Name $object->firstName" . PHP_EOL;
echo "Middle Name $object->middleName" . PHP_EOL;
echo "Last Name $object->lastName" . PHP_EOL;

// convert from stdClass back to array
$arrayAgain = (array) $object;
var_dump($arrayAgain);

require_once "Data/Person.php";

$person = new Person("Angga", "Surabaya");
var_dump($person);

$arrayPerson = (array) $person;
var_dump($arrayPerson);
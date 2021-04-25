<?php

require_once "data/Person.php";

$person = new Person("Angga", "Surabaya");
$person->name = "Harry";
$person->address = "Jakarta";

var_dump($person);

echo "Name: $person->name" . PHP_EOL;
echo "Address: $person->address" . PHP_EOL;
echo "Country: $person->country" . PHP_EOL;

$person2 = new Person("Ari", null);
$person2->name = "Ari";
$person2->address = null;

var_dump($person2);

// error
// $person2->name = [];
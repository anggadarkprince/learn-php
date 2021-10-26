<?php

require_once "Data/SayGoodByeTrait.php";

use Data\Traits\{Person, SayHello, SayGoodBye};

$person = new Person();
$person->goodBye("Joko");
$person->hello("Budi");

$person->name = "Eko";
var_dump($person);

$person->run();
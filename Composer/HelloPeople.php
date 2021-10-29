<?php
require_once __DIR__ . '/vendor/autoload.php';

use MyApp\Data\People;

$people = new People("Angga");

echo $people->sayHello("Ari") . PHP_EOL;
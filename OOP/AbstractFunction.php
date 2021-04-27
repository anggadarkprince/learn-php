<?php

require_once "Data/Animal.php";

use Data\{Animal, Cat, Dog};

$cat = new Cat();
$cat->name = 'Catty';
$cat->run();

$dog = new Dog();
$cat->name = 'Doggy';
$dog->run();
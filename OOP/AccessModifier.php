<?php

require_once "Data/Product.php";

$product = new Product("Apple", 20000);

// public visibility
echo $product->getName() . PHP_EOL;
echo $product->getPrice() . PHP_EOL;

$snack = new Snack("Chocolate", 1000);
$snack->info();

// private cannot accessed from outside the class
// $product->serialNumber = "Cake";

// protected visibility cannot accessed from outside as well
// $product->price = 4000;
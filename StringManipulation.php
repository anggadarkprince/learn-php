<?php

$name = "Angga Ari Wijaya";

// concatenation
echo "Name : " . $name . PHP_EOL;
echo "Value : " . 100 . PHP_EOL;

// cast integer to string
$valueString = (string)100;
var_dump($valueString);

// parse string into integer
$valueInt = (int)"100";
var_dump($valueInt);

// parse float from string
$valueFloat = (float)"1.02";
var_dump($valueFloat);

// string by default is char[], each character can accessed by index
$name = "Angga";
echo $name[0] . PHP_EOL;
echo $name[1] . PHP_EOL;
echo $name[2] . PHP_EOL;

// include variable into string
echo "Hello " . $name . ", Selamat Belajar PHP" . PHP_EOL;
echo "Hello $name, Selamat Belajar PHP" . PHP_EOL;

$var = "Angga";
$data['name'] = "ga";
echo "Hello {$name[0]}{$name[1]}{$name[2]}-{$data['name']}, Selamat Belajar PHP" . PHP_EOL;
echo "This is {$var}'s book" . PHP_EOL;
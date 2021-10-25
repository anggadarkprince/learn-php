<?php

$a1 = 10;
$a2 = 10;
$a3 = 10;

// this statement
$b = ++$a1; // $a1 immediately add by 1 and assigned into $b variable
$b2 = $a2++; // assign with $a2=10 then plus one is used after the statement
var_dump($a2); // value $a2=11

// same as bellow
$c = $a3 + 1;


var_dump($a1);
var_dump($b);
var_dump($c);
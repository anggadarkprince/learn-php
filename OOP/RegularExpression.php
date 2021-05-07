<?php

$matches = [];
$result = preg_match_all("/angga|awan|edy/i", "Angga Ari Wijaya", $matches);

var_dump($result);
var_dump($matches);

$result = preg_replace("/anjing|bangsat/i", "***", "dasar lu ANJING dan BANGSAT!");

var_dump($result);

$result = preg_split("/[\s,-]/", "Angga Ari Wijaya,Programmer,Full-Stack Developer");

var_dump($result);
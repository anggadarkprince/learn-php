<?php
$value = "E";
$result = "";

switch ($value){
    case "A":
    case "B":
    case "C":
        $result = "You passed";
        break;
    case "D" :
        $result = "You failed";
        break;
    case "E":
        $result = "Maybe you drop out";
        break;
    default:
        $result = "What a score?";
}

echo $result . PHP_EOL;

$result = match ($value){
    "A", "B", "C" => "You passed",
    "D" => "You failed",
    "E" => "Maybe you drop out",
    default => "What a score?"
};

echo $result . PHP_EOL;

$value = 65;

$result = match (true){
    $value >= 80 => "A",
    $value >= 70 => "B",
    $value >= 60 => "C",
    $value >= 50 => "D",
    default => "E"
};

echo $result . PHP_EOL;

$name = "Mrs. Nani";

$result = match (true){
    str_contains($name, "Mr.") => "Hello Sir",
    str_contains($name, "Mrs.") => "Hello Mam",
    default => "Hello"
};

echo $result . PHP_EOL;
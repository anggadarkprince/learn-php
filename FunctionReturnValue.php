<?php

// define function and set the return data type as integer
function sum(int $first, int $second): int {
    return $first + $second;
}

$result = sum(5, 10);
var_dump($result);

$result = sum(100, 150);
var_dump($result);

// return string as value
function getExamValue(int $value): string {
    if ($value >= 80) {
        return "A";
    } else if ($value >= 70) {
        return "B";
    } else if ($value >= 60) {
        return "C";
    } else if ($value >= 50) {
        return "D";
    } else {
        return "E";
    }
}

$score = getExamValue(90);
var_dump($score);

$score = getExamValue(30);
var_dump($score);

// function can return another function or callable
function multipleValue(int $value): callable {
    return function (int $divider) use ($value): int {
        return $value * 2 / $divider;
    };
}

$enhancedFunction = multipleValue(2);
echo $enhancedFunction(4);
<?php

// create function with argument and default value of argument
function sayHello($firstName, $lastName = "") {
    echo "Hello {$firstName} {$lastName}" . PHP_EOL;
}

// will error, because first argument is required
// sayHello();

// second argument is optional and automatically assigned with default value
sayHello("Angga");
sayHello("Ari");

// use all arguments, passing "Ari" as second argument replace the default
sayHello("Angga", "Ari");

// strict the argument with data type constraint,
// if non integer value passed into the function then PHP would guess or auto cast to integer
function sum(int $first, int $last) {
    $total = $first + $last;
    echo "Total $first + $last = $total" . PHP_EOL;
}

// see the result
sum(100, 100);
sum("100", "100"); // cast-able into integer ("100"=100)
// sum("an", "gga"); // will product Argument #1 ($first) must be of type int, string given
sum(true, false); // cast-able into integer (true=1, false=0)

// dynamic argument will populated into single array
function sumAll(...$values) {
    $total = 0;
    foreach ($values as $value) {
        $total += $value;
    }
    echo "Total " . implode(",", $values) . " = $total" . PHP_EOL;
}

// put many arguments
sumAll(1, 2, 3, 4, 5);

// destructure argument from array
$values = [1, 2, 3, 4, 5];
sumAll(...$values); // same as sumAll(1, 2, 3, 4, 5);

// it make the first argument is array, different than above
sumAll($values); // will produce error due to inside the function accept integer of each element of the params
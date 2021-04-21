<?php
$data = [1, 2, 3, 4, 5];

// loop through array and applied return of the function
$dataResult = array_map(fn(int $value) => $value * 10, $data);
var_dump($dataResult);

// filter array by return condition of the callback function
$evenValues = array_filter($data, fn($item) => $item % 2 === 0);
var_dump($evenValues);

// Iteratively reduce the array to a single value using a callback function
$collection = array_reduce($data, function ($carry, $item) {
    if ($item % 2 === 0) {
        $carry['even'][] = $item;
    } else {
        $carry['odd'][] = $item;
    }
    return $carry;
}, []);
var_dump($collection);

// sum value of array
$totalData = array_sum($data);
var_dump($totalData);

// merge array into single one
$mergedArray = array_merge([1, 2, 3], [2, 3, 4]);
var_dump($mergedArray);

// extract value from assoc array
$contacts = [
    [
        "name" => "Angga",
        "contact" => "085655479868"
    ],
    [
        "name" => "Ari",
        "contact" => "082730089323"
    ],
];
$contactCollection = array_column($contacts, 'contact');
var_dump($contactCollection);

// sort array in reverse order
rsort($data);
var_dump($data);

// get keys of array
var_dump(array_keys($data));
// return values of the array and reset index
var_dump(array_values($data));

$person = [
    "first_name" => "Angga",
    "last_name" => "Ari",
    "age" => 27,
];
var_dump(array_keys($person));
var_dump(array_values($person));
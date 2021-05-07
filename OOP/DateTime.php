<?php

$dateTime = new DateTime();
$dateTime->setDate(1990, 1, 20);
$dateTime->setTime(10, 10, 10, 0);

$dateTime->add(new DateInterval("P1Y"));

$minusOneMonth = new DateInterval("P1M");
$minusOneMonth->invert = true;
$dateTime->add($minusOneMonth);
//$dateTime->sub($minusOneMonth); // without set invert

var_dump($dateTime);

$now = new DateTime();
var_dump($now);
$now->setTimezone(new DateTimeZone("America/Toronto"));
var_dump($now);

$string = $now->format("Y-m-d H:i:s");
echo "Now : $string" . PHP_EOL;

$date = DateTime::createFromFormat("Y-m-d H:i:s", "2021-05-10 10:10:10", new DateTimeZone("Asia/Jakarta"));
if ($date) {
    var_dump($date);
} else {
    echo "Invalid format" . PHP_EOL;
}
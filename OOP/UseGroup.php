<?php

require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\{Conflict as Conflict1, Dummy, Sample};
use function Helper\{helpMe as help, letMeGo};
use const Helper\{APPLICATION as APP, VERSION};

$conflict1 = new Conflict1();
$dummyObject = new Dummy();
$sampleData = new Sample();

help();
letMeGo();

echo APP . PHP_EOL;
echo VERSION . PHP_EOL;
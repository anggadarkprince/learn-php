<?php

require_once "Data/Location.php";

use Data\{Location, City, Country};

// cannot instantiate abstract class
//$location = new Location();

// only inherited class
$city = new City("Surabaya");
$country = new Country("Indonesia");
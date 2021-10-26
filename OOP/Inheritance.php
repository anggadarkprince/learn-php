<?php

require_once "Data/Manager.php";

$manager = new Manager();
$manager->name = "Angga";
$manager->sayHello("Ari");

$vp = new VicePresident();
$vp->name = "Wijaya";
$vp->sayHello("Ari");
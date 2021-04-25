<?php

require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Angga";
$manager->sayHello("Ari");

$vp = new VicePresident();
$vp->name = "Wijaya";
$vp->sayHello("Ari");
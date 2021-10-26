<?php

require_once "Data/Programmer.php";

$company = new Company();
$company->programmer = new Programmer("Angga");
var_dump($company);

$company->programmer = new BackendProgrammer("Ari");
var_dump($company);

$company->programmer = new FrontendProgrammer("Wijaya");
var_dump($company);

// function argument polymorphism
sayHelloProgrammer(new Programmer("Angga"));
sayHelloProgrammer(new BackendProgrammer("Angga"));
sayHelloProgrammer(new FrontendProgrammer("Angga"));
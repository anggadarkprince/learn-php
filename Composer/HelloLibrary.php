<?php

use Anggadarkprince\ComposerLibraryHello\Customer;

require_once __DIR__ . "/vendor/autoload.php";

$customer = new Customer("Angga");

echo $customer->sayHello("Ari");

echo $customer->sayHello("Wijaya", "Mr");
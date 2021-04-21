<?php

// define constant
define("AUTHOR", "Angga Ari Wijaya");
define("APP_VERSION", 100);

echo "Author : ";
echo AUTHOR;
echo "\n";

echo "App Version : ";
echo APP_VERSION;
echo "\n";

// check if constant is exist of create new one
defined('APP_BUILD_NUMBER') OR define('APP_BUILD_NUMBER', '2021.023.324-Alpha');
echo APP_BUILD_NUMBER;
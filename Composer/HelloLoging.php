<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require_once __DIR__ . "/vendor/autoload.php";

$log = new Logger("MyApp");
$log->pushHandler(new StreamHandler("application.log", Logger::INFO));

$log->info("Hello world");
$log->info("Welcome to Composer");
$log->error("Something went wrong");
<?php

require_once "Exception/ValidationException.php";
require_once "Data/LoginRequest.php";
require_once "Helpers/Validation.php";

$loginRequest = new LoginRequest();
$loginRequest->username = "angga";
$loginRequest->password = "  ";

try {
    validateLoginRequest($loginRequest);
    echo "VALID" . PHP_EOL;
} catch (ValidationException | Exception $exception) {
    echo "Error : {$exception->getMessage()}" . PHP_EOL;

    var_dump($exception->getTrace());

    echo $exception->getTraceAsString() . PHP_EOL;
} finally {
    echo "Always executed" . PHP_EOL;
}



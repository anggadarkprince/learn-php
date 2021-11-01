<?php

use Anggadarkprince\SimplePhpMvc\Cores\Router;
use Anggadarkprince\SimplePhpMvc\Exceptions\HttpNotFoundException;
use Anggadarkprince\SimplePhpMvc\Exceptions\ViewInvalidPathException;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/routes.php';

try {
    Router::run();
} catch (HttpNotFoundException $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();
} catch (ViewInvalidPathException $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();
}
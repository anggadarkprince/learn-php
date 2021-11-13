<?php

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Cores\Router;
use Anggadarkprince\SimpleWebLogin\Exceptions\HttpNotFoundException;
use Anggadarkprince\SimpleWebLogin\Exceptions\ViewInvalidPathException;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/routes.php';

try {
    Database::getConnection('prod');
    Router::run();
} catch (HttpNotFoundException $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();
} catch (ViewInvalidPathException $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();
}
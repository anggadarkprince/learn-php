<?php

use Anggadarkprince\SimplePhpMvc\Controllers\HomeController;
use Anggadarkprince\SimplePhpMvc\Controllers\LoginController;
use Anggadarkprince\SimplePhpMvc\Controllers\ProductController;
use Anggadarkprince\SimplePhpMvc\Cores\Router;

Router::add('GET', '/', HomeController::class, 'index');

Router::add('GET', '/login', LoginController::class, 'index');
Router::add('POST', '/login', LoginController::class, 'login');

Router::add('GET', '/product/([0-9a-zA-Z]*)/category/([0-9a-zA-Z]*)', ProductController::class, 'categories');
<?php

use Anggadarkprince\SimplePhpMvc\Controllers\HomeController;
use Anggadarkprince\SimplePhpMvc\Controllers\LoginController;
use Anggadarkprince\SimplePhpMvc\Cores\Router;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/login', LoginController::class, 'index');
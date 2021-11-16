<?php

use Anggadarkprince\SimpleWebLogin\Controllers\HomeController;
use Anggadarkprince\SimpleWebLogin\Cores\Router;
use Anggadarkprince\SimpleWebLogin\Controllers\UserController;
use Anggadarkprince\SimpleWebLogin\Middleware\MustAuthenticatedMiddleware;
use Anggadarkprince\SimpleWebLogin\Middleware\RedirectIfAuthenticatedMiddleware;


// Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

// User Controller
Router::add('GET', '/users/register', UserController::class, 'register', [RedirectIfAuthenticatedMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister', [RedirectIfAuthenticatedMiddleware::class]);
Router::add('GET', '/users/login', UserController::class, 'login', [RedirectIfAuthenticatedMiddleware::class]);
Router::add('POST', '/users/login', UserController::class, 'postLogin', [RedirectIfAuthenticatedMiddleware::class]);
Router::add('GET', '/users/logout', UserController::class, 'logout', [MustAuthenticatedMiddleware::class]);
Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustAuthenticatedMiddleware::class]);
Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustAuthenticatedMiddleware::class]);
Router::add('GET', '/users/password', UserController::class, 'updatePassword', [MustAuthenticatedMiddleware::class]);
Router::add('POST', '/users/password', UserController::class, 'postUpdatePassword', [MustAuthenticatedMiddleware::class]);
<?php

namespace Anggadarkprince\SimplePhpMvc\Middleware;

use Anggadarkprince\SimplePhpMvc\Cores\Middleware;

class AuthMiddleware implements Middleware
{

    public function before(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

    public function after($args): void
    {
    }
}
<?php

namespace Anggadarkprince\SimplePhpMvc\Controllers;

use Anggadarkprince\SimplePhpMvc\Cores\View;

class LoginController
{
    public function index()
    {
        View::render('auth/logins');
    }
}
<?php

namespace Anggadarkprince\SimplePhpMvc\Controllers;

use Anggadarkprince\SimplePhpMvc\Cores\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->render('auth/login');
    }

    public function login(): void
    {
        $email = $this->post('email');
        $password = $this->input('password'); // check $_POST then $_GET

        $this->renderJson([
            'email' => $email,
            'password' => $password
        ]);
    }
}
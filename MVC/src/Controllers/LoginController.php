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
        $password = $this->input('password');

        session_start();
        $_SESSION['user'] = [
            'email' => $email
        ];

        $this->renderJson([
            'email' => $email,
            'password' => $password
        ]);
    }

    public function logout(): void
    {
        session_start();

        $email = $_SESSION['user']['email'] ?? 'Unknown';

        session_unset();

        echo "User $email is logged out";
    }
}
<?php

namespace Anggadarkprince\SimplePhpMvc\Controllers;

use Anggadarkprince\SimplePhpMvc\Cores\Controller;
use Anggadarkprince\SimplePhpMvc\Repositories\UserRepository;
use Anggadarkprince\SimplePhpMvc\Services\LoginService;

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

        $userRepository = new UserRepository();
        $service = new LoginService($userRepository);
        $isLogin = $service->login($email, $password);

        if ($isLogin) {
            session_start();
            $_SESSION['user'] = [
                'email' => $email
            ];

            $this->renderJson([
                'email' => $email,
                'password' => $password
            ]);
        }

        $this->renderJson([
            'status' => 'Unauthorized',
        ], 401);
    }

    public function logout(): void
    {
        session_start();

        $email = $_SESSION['user']['email'] ?? 'Unknown';

        session_unset();

        echo "User $email is logged out";
    }
}
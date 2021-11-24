<?php

namespace Anggadarkprince\SimplePhpMvc\Services;

use Anggadarkprince\SimplePhpMvc\Repositories\UserRepository;

class LoginService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->getByEmail($email);

        if (!is_null($user)) {
            $storedPassword = $user->getPassword();

            if (password_verify($password, $storedPassword)) {
                return true;
            }
        }

        return false;
    }
}
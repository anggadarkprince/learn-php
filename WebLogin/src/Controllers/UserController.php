<?php

namespace Anggadarkprince\SimpleWebLogin\Controllers;

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Cores\View;
use Anggadarkprince\SimpleWebLogin\Exceptions\ValidationException;
use Anggadarkprince\SimpleWebLogin\Exceptions\ViewInvalidPathException;
use Anggadarkprince\SimpleWebLogin\Models\UserLoginRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserPasswordUpdateRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserProfileUpdateRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserRegisterRequest;
use Anggadarkprince\SimpleWebLogin\Repositories\SessionRepository;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;
use Anggadarkprince\SimpleWebLogin\Services\SessionService;
use Anggadarkprince\SimpleWebLogin\Services\UserService;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    /**
     * Show register page.
     *
     * @throws ViewInvalidPathException
     */
    public function register()
    {
        View::render('User/register', [
            'title' => 'Register new User'
        ]);
    }

    /**
     * Save register data.
     *
     * @throws ViewInvalidPathException
     */
    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->id = $_POST['id'];
        $request->name = $_POST['name'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            View::redirect('/users/login');
        } catch (ValidationException $exception) {
            View::render('User/register', [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Show login page.
     *
     * @throws ViewInvalidPathException
     */
    public function login()
    {
        View::render('User/login', [
            "title" => "Login user"
        ]);
    }

    /**
     * Check user login.
     *
     * @throws ViewInvalidPathException
     */
    public function postLogin()
    {
        $request = new UserLoginRequest();
        $request->id = $_POST['id'];
        $request->password = $_POST['password'];

        try {
            $response = $this->userService->login($request);
            $this->sessionService->create($response->user->id);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/login', [
                'title' => 'Login user',
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Logging out user.
     */
    public function logout()
    {
        $this->sessionService->destroy();

        View::redirect("/");
    }

    /**
     * Show update profile.
     *
     * @throws ViewInvalidPathException
     */
    public function updateProfile()
    {
        $user = $this->sessionService->current();

        View::render('User/profile', [
            "title" => "Update user profile",
            "user" => [
                "id" => $user->id,
                "name" => $user->name
            ]
        ]);
    }

    /**
     * Update profile data.
     *
     * @throws ViewInvalidPathException
     */
    public function postUpdateProfile()
    {
        $user = $this->sessionService->current();

        $request = new UserProfileUpdateRequest();
        $request->id = $user->id;
        $request->name = $_POST['name'];

        try {
            $this->userService->updateProfile($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/profile', [
                "title" => "Update user profile",
                "error" => $exception->getMessage(),
                "user" => [
                    "id" => $user->id,
                    "name" => $_POST['name']
                ]
            ]);
        }
    }

    /**
     * Show update password form.
     *
     * @throws ViewInvalidPathException
     */
    public function updatePassword()
    {
        $user = $this->sessionService->current();
        View::render('User/password', [
            "title" => "Update user password",
            "user" => [
                "id" => $user->id
            ]
        ]);
    }

    /**
     * Update password data.
     *
     * @throws ViewInvalidPathException
     */
    public function postUpdatePassword()
    {
        $user = $this->sessionService->current();
        $request = new UserPasswordUpdateRequest();
        $request->id = $user->id;
        $request->oldPassword = $_POST['oldPassword'];
        $request->newPassword = $_POST['newPassword'];

        try {
            $this->userService->updatePassword($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/password', [
                "title" => "Update user password",
                "error" => $exception->getMessage(),
                "user" => [
                    "id" => $user->id
                ]
            ]);
        }
    }
}
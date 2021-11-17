<?php

namespace Anggadarkprince\SimpleWebLogin\Controllers;

require_once __DIR__ . '/../Helper/helper.php';

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Domains\Session;
use Anggadarkprince\SimpleWebLogin\Domains\User;
use Anggadarkprince\SimpleWebLogin\Repositories\SessionRepository;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;
use Anggadarkprince\SimpleWebLogin\Services\SessionService;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    private UserController $userController;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $this->userController = new UserController();

        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();

        $this->userRepository = new UserRepository(Database::getConnection());
        $this->userRepository->deleteAll();

        putenv("mode=test");
    }

    public function testRegister()
    {
        $this->userController->register();

        $this->expectOutputRegex("[Register]");
        $this->expectOutputRegex("[User ID]");
        $this->expectOutputRegex("[Name]");
        $this->expectOutputRegex("[Password]");
    }

    public function testPostRegisterSuccess()
    {
        $_POST['id'] = 'angga';
        $_POST['name'] = 'Angga Ari Wijaya';
        $_POST['password'] = 'secret';

        $this->userController->postRegister();

        $this->expectOutputRegex("[Location: /users/login]");
    }

    public function testPostRegisterValidationError()
    {
        $_POST['id'] = '';
        $_POST['name'] = 'Angga Ari Wijaya';
        $_POST['password'] = 'secret';

        $this->userController->postRegister();

        $this->expectOutputRegex("[Register]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Name]");
        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Register new User]");
        $this->expectOutputRegex("[Id, Name, Password can not blank]");
    }

    public function testPostRegisterDuplicate()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga Ari Wijaya";
        $user->password = "secret";

        $this->userRepository->save($user);

        $_POST['id'] = 'angga';
        $_POST['name'] = 'Angga Ari Wijaya';
        $_POST['password'] = 'secret';

        $this->userController->postRegister();

        $this->expectOutputRegex("[Register]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Name]");
        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Register new User]");
        $this->expectOutputRegex("[User Id already exists]");
    }

    public function testLogin()
    {
        $this->userController->login();

        $this->expectOutputRegex("[Login user]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Password]");
    }

    public function testLoginSuccess()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga Ari Wijaya";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);

        $this->userRepository->save($user);

        $_POST['id'] = 'angga';
        $_POST['password'] = 'secret';

        $this->userController->postLogin();

        $this->expectOutputRegex("[Location: /]");
        $this->expectOutputRegex("[X-APP-SESSION: ]");
    }

    public function testLoginValidationError()
    {
        $_POST['id'] = '';
        $_POST['password'] = '';

        $this->userController->postLogin();

        $this->expectOutputRegex("[Login user]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id, Password can not blank]");
    }

    public function testLoginUserNotFound()
    {
        $_POST['id'] = 'notfound';
        $_POST['password'] = 'notfound';

        $this->userController->postLogin();

        $this->expectOutputRegex("[Login user]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id or password is wrong]");
    }

    public function testLoginWrongPassword()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);

        $this->userRepository->save($user);

        $_POST['id'] = 'angga';
        $_POST['password'] = 'wrong password';

        $this->userController->postLogin();

        $this->expectOutputRegex("[Login user]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id or password is wrong]");
    }

    public function testLogout()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->userController->logout();

        $this->expectOutputRegex("[Location: /]");
        $this->expectOutputRegex("[X-APP-SESSION: ]");
    }

    public function testUpdateProfile()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->userController->updateProfile();

        $this->expectOutputRegex("[Profile]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[angga]");
        $this->expectOutputRegex("[Name]");
        $this->expectOutputRegex("[Angga]");
    }

    public function testPostUpdateProfileSuccess()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $_POST['name'] = 'Ari';
        $this->userController->postUpdateProfile();

        $this->expectOutputRegex("[Location: /]");

        $result = $this->userRepository->findById("angga");
        self::assertEquals("Ari", $result->name);
    }

    public function testPostUpdateProfileValidationError()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $_POST['name'] = '';
        $this->userController->postUpdateProfile();

        $this->expectOutputRegex("[Profile]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[angga]");
        $this->expectOutputRegex("[Name]");
        $this->expectOutputRegex("[Id, Name can not blank]");
    }

    public function testUpdatePassword()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->userController->updatePassword();

        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[angga]");
    }

    public function testPostUpdatePasswordSuccess()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $_POST['oldPassword'] = 'secret';
        $_POST['newPassword'] = 'angga';

        $this->userController->postUpdatePassword();

        $this->expectOutputRegex("[Location: /]");

        $result = $this->userRepository->findById($user->id);
        self::assertTrue(password_verify("angga", $result->password));
    }

    public function testPostUpdatePasswordValidationError()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $_POST['oldPassword'] = '';
        $_POST['newPassword'] = '';

        $this->userController->postUpdatePassword();

        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[angga]");
        $this->expectOutputRegex("[Id, Old Password, New Password can not blank]");
    }

    public function testPostUpdatePasswordWrongOldPassword()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga";
        $user->password = password_hash("secret", PASSWORD_BCRYPT);
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $_POST['oldPassword'] = 'wrong';
        $_POST['newPassword'] = 'ari';

        $this->userController->postUpdatePassword();

        $this->expectOutputRegex("[Password]");
        $this->expectOutputRegex("[Id]");
        $this->expectOutputRegex("[angga]");
        $this->expectOutputRegex("[Old password is wrong]");
    }

}
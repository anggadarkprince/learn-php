<?php

namespace Anggadarkprince\SimpleWebLogin\Middleware;

require_once __DIR__ . '/../Helper/helper.php';

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Domains\Session;
use Anggadarkprince\SimpleWebLogin\Domains\User;
use Anggadarkprince\SimpleWebLogin\Repositories\SessionRepository;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;
use Anggadarkprince\SimpleWebLogin\Services\SessionService;
use PHPUnit\Framework\TestCase;

class MustAuthenticatedMiddlewareTest extends TestCase
{
    private MustAuthenticatedMiddleware $middleware;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $this->middleware = new MustAuthenticatedMiddleware();
        putenv("mode=test");

        $this->userRepository = new UserRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());

        $this->sessionRepository->deleteAll();
        $this->userRepository->deleteAll();
    }

    public function testBeforeGuest()
    {
        $this->middleware->before();
        $this->expectOutputRegex("[Location: /users/login]");
    }

    public function testBeforeLoginUser()
    {
        $user = new User();
        $user->id = "angga";
        $user->name = "Angga Ari Wijaya";
        $user->password = "anggaari";
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->middleware->before();
        $this->expectOutputString("");
    }

}

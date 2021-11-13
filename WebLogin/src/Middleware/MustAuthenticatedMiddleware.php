<?php

namespace Anggadarkprince\SimpleWebLogin\Middleware;

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Cores\Middleware;
use Anggadarkprince\SimpleWebLogin\Cores\View;
use Anggadarkprince\SimpleWebLogin\Repositories\SessionRepository;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;
use Anggadarkprince\SimpleWebLogin\Services\SessionService;

class MustAuthenticatedMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    public function before(): void
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::redirect('/users/login');
        }
    }

    public function after($args): void
    {
    }
}
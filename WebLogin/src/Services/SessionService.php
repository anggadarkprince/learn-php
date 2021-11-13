<?php

namespace Anggadarkprince\SimpleWebLogin\Services;

use Anggadarkprince\SimpleWebLogin\Domains\Session;
use Anggadarkprince\SimpleWebLogin\Domains\User;
use Anggadarkprince\SimpleWebLogin\Repositories\SessionRepository;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;

class SessionService
{
    public static string $COOKIE_NAME = "X-APP-SESSION";

    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    public function __construct(SessionRepository $sessionRepository, UserRepository $userRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Create new session.
     *
     * @param string $userId
     * @return Session
     */
    public function create(string $userId): Session
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = $userId;

        $this->sessionRepository->save($session);

        setcookie(self::$COOKIE_NAME, $session->id, time() + (60 * 60 * 24 * 30), "/");

        return $session;
    }

    /**
     * Delete session in repository and cookie.
     */
    public function destroy()
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);

        setcookie(self::$COOKIE_NAME, '', 1, "/");
    }

    /**
     * Get current user session.
     *
     * @return User|null
     */
    public function current(): ?User
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findById($sessionId);
        if ($session == null) {
            return null;
        }

        return $this->userRepository->findById($session->userId);
    }

    /**
     * Check if user is authenticated.
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        $user = $this->current();

        return !is_null($user);
    }
}
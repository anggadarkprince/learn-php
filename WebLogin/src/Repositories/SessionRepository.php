<?php

namespace Anggadarkprince\SimpleWebLogin\Repositories;

use Anggadarkprince\SimpleWebLogin\Domains\Session;
use PDO;

class SessionRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Store data into session.
     *
     * @param Session $session
     * @return Session
     */
    public function save(Session $session): Session
    {
        $statement = $this->connection->prepare("INSERT INTO sessions(id, user_id) VALUES (?, ?)");
        $statement->execute([$session->id, $session->userId]);
        return $session;
    }

    /**
     * Get session by id.
     *
     * @param string $id
     * @return Session|null
     */
    public function findById(string $id): ?Session
    {
        $statement = $this->connection->prepare("SELECT id, user_id from sessions WHERE id = ?");
        $statement->execute([$id]);

        try {
            if($row = $statement->fetch()){
                $session = new Session();
                $session->id = $row['id'];
                $session->userId = $row['user_id'];
                return $session;
            }else{
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    /**
     * Delete session by id.
     *
     * @param string $id
     */
    public function deleteById(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM sessions WHERE id = ?");
        $statement->execute([$id]);
    }

    /**
     * Delete all sessions.
     */
    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM sessions");
    }
}
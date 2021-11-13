<?php

namespace Anggadarkprince\SimpleWebLogin\Config;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    /**
     * Get connection instance.
     *
     * @param string $env
     * @return PDO
     */
    public static function getConnection(string $env = "test"): PDO
    {
        if (self::$pdo == null) {
            require_once __DIR__ . '/../../config/database.php';
            $config = getDatabaseConfig();
            self::$pdo = new PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
            );
        }

        return self::$pdo;
    }

    /**
     * Start transaction.
     */
    public static function beginTransaction()
    {
        self::$pdo->beginTransaction();
    }

    /**
     * Commit transaction.
     */
    public static function commitTransaction()
    {
        self::$pdo->commit();
    }

    /**
     * Rollback transaction.
     */
    public static function rollbackTransaction()
    {
        self::$pdo->rollBack();
    }
}
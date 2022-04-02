<?php

namespace App\Systems;

use App\Configs\DatabaseConfig;

class Database
{
    private static ?\PDO $connection = null;

    private function __construct()
    {
        // Leave this empty
    }

    public static function getConnection()
    {
        $databaseConfig = new DatabaseConfig();

        if (is_null(self::$connection)) {
            try {
                $dsn = "mysql:host=$databaseConfig->hostname;port=$databaseConfig->port;dbname=$databaseConfig->database";
                self::$connection = new \PDO($dsn, $databaseConfig->username, $databaseConfig->password);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return self::$connection;
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        return self::$connection;
    }
}

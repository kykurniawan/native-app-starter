<?php

namespace App\Systems;

use App\Systems\Database;

class Repository
{
    protected \PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }
}

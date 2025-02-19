<?php

namespace App\Database;

use App\Database\Dsn;

// La classe n'hérite pas de AbstractCommand, mais elle devrait, peut être mettre cette classe ailleurs plus tard
class DbConnexion
{

    public function execute()
    {
        try {
            $dsn = new Dsn();
            $db = new \PDO("mysql:host={$dsn->getHost()};dbname={$dsn->getDbName()};port={$dsn->getPort()}", $dsn->getUser(), $dsn->getPassword());
            return $db;
        } catch (\PDOException $e) {
            echo $e->getMessage();

            $db = null;
            return false;
        }
    }
}

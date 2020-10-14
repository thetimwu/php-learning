<?php

namespace App;

use PDO;

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $psw = "root";
    private $dbName = "test1";

    public function connect()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->psw);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

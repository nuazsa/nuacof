<?php

namespace Nuazsa\Nuacof\Config;

use PDO;
use Dotenv\Dotenv;

class Connection
{
    public static function getConnection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        return new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    }
}

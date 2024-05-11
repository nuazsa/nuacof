<?php

namespace Nuazsa\Nuacof\Config;

use PDO;
use Dotenv\Dotenv;

class Connection
{
    private static $pdo;
    
    /**
     * Get a PDO database connection using environment variables.
     *
     * @return PDO A PDO database connection instance.
     */
    public static function getConnection()
    {
        // Load environment variables from the .env file
        // Library docs: https://github.com/vlucas/phpdotenv
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        // Retrieve database connection details from environment variables
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        if (!self::$pdo) {
            // Create PDO connection if it doesn't exist
            // Your connection code here
            self::$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        }

        // Create and return a new PDO database connection instance
        return self::$pdo;
    }
}

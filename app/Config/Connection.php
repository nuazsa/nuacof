<?php

namespace Nuazsa\Nuacof\Config;

use PDO;

class Connection
{
    public static function getConnection()
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "testing_nuacof";
        $username = "root";
        $password = "";

        return new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    }
}

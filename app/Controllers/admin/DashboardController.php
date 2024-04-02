<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\Config\Connection;

class DashboardController
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['admin_email'])) {
            $connection = Connection::getConnection();
            $stmt = $connection->prepare("SELECT * FROM admin WHERE email = :email");
            $stmt->bindParam(':email', $_SESSION['admin_email']);
            $stmt->execute();
            $result = $stmt->fetch();

            echo $result['name'];
            echo "<a href='/admin/logout'>logout</a>";
        } else {
            header("Location: /admin/signin");
            exit(); // Penting untuk memastikan redirect berjalan dengan benar
        }
    }
}


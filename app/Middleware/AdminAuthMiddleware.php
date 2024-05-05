<?php

namespace Nuazsa\Nuacof\Middleware;

class AdminAuthMiddleware implements Middleware
{
    
    function before(): void
    {
        session_start();
        if (!isset($_SESSION['admin']['email'])) {
            header('Location: /admin/signin');
            exit;
        }
    }
}
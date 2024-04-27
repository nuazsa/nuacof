<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;

class UserController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AdminAuthService();
    }

    public function standings() 
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {

            $this->authService->checkLoggedIn();
            $admin = $this->authService->getByEmail($_SESSION['admin_email']);
    
            $model = [
                'title' => 'Standings',
                'data' => $admin
            ];

            View::render('admin/standings', $model);
            return;
        }
    }
}
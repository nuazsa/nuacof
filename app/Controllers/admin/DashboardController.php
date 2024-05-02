<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\Services\admin\AdminAuthService;
use Nuazsa\Nuacof\View;

class DashboardController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AdminAuthService();
    }

    public function index() 
    {
        $admin = $this->authService->getByEmail($_SESSION['admin_email']);

        $model = [
            'title' => 'Dashboard',
            'data' => $admin
        ];

        View::render('admin/dashboard', $model);
    }
}


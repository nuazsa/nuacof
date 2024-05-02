<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\Services\admin\AdminAuthService;
use Nuazsa\Nuacof\View;

class ManagerController
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
            'title' => 'Manager',
            'data' => $admin
        ];
        view::render('admin/manager', $model);
    }
}

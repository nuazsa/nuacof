<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;

class OrdersController
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
            'title' => 'Orders',
            'data' => $admin,
            'action' => 'Date'
        ];
        view::render('admin/orders', $model);
    }
}

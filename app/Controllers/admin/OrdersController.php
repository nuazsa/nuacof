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
        $this->authService->checkLoggedIn();
        $admin = $this->authService->getByEmail($_SESSION['admin_email']);

        $model = ['title' => 'Orders' , 'data' => $admin];
        view::render('admin/orders', $model);
    }
}

<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;

class UiController
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
            'title' => 'UI',
            'data' => $admin
        ];

        View::render('admin/ui', $model);
    }
}

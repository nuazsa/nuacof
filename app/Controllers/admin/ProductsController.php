<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;

class ProductsController
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

        $model = [
            'title' => 'Products',
            'data' => $admin,
            'action' => 'New product'
        ];
        
        View::render('admin/products/products', $model);
    }

    public function addproduct() 
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {

            $this->authService->checkLoggedIn();
            $admin = $this->authService->getByEmail($_SESSION['admin_email']);
    
            $model = [
                'title' => 'AddProduct',
                'data' => $admin
            ];

            View::render('admin/products/add', $model);
            return;
        }
    }

    public function editproduct() 
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {

            $this->authService->checkLoggedIn();
            $admin = $this->authService->getByEmail($_SESSION['admin_email']);
    
            $model = [
                'title' => 'EditProduct',
                'data' => $admin
            ];

            View::render('admin/products/edit', $model);
            return;
        }
    }
}

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
        if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
            $uploadImage = $_FILES['uploadImage'];
            $productName = htmlspecialchars($_POST['productName']);
            $price = htmlspecialchars($_POST['price']);
            $discount = htmlspecialchars($_POST['discount']);
            $piece = htmlspecialchars($_POST['piece']);
            $description = htmlspecialchars($_POST['description']);
            $category = htmlspecialchars($_POST['category']);

            $data = [
                'uploadImage' => $uploadImage,
                'Name' => $productName,
                'Price' => $price,
                'Discount' => $discount,
                'Piece' => $piece,
                'Description' => $description,
                'Category' => $category
            ];

            print_r($data);
        } else {
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

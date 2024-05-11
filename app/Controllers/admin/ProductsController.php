<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\ProductService;

class ProductsController
{
    private $productService;
    private string $filter;
    private string $sort;
    private int $pagination;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {

        $this->filter = isset($_SESSION['filter']) ? $_SESSION['filter'] : '';
        $this->sort = isset($_SESSION['sort']) ? $_SESSION['sort'] : '';
        $this->pagination = isset($_SESSION['pagination']) ? $_SESSION['pagination'] : 0;

        $count = $this->productService->countProduct();

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (isset($_POST['filter'])) {
                $this->filter = htmlspecialchars($_POST['filter']);
                $_SESSION['filter'] = $this->filter;
            }
            if (isset($_POST['sort'])) {
                $this->sort = htmlspecialchars($_POST['sort']);
                $_SESSION['sort'] = $this->sort;
            } 

            if (isset($_POST['pagination'])) {
                $direction = $_POST['pagination'];
                if ($direction === '+' || $direction === '-') {
                    $this->pagination += ($direction === '+') ? 5 : -5;
                    $this->pagination = max(0, min($this->pagination, $count));
                    $_SESSION['pagination'] = $this->pagination;
                }
            }
            
        }

        $product = $this->productService->getAllProduct($this->filter, $this->sort, $this->pagination);

        $model = [
            'title' => 'Products',
            'css' => 'Products',
            'product' => $product,
            'count' => $count,
            'filter' => $this->filter,
            'sort' => $this->sort,
            'pagination' => $this->pagination,
            'action' => 'New product'
        ];

        View::render('admin/products/products', $model);
    }


    public function addproduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
            $image = $_FILES['uploadImage'];
            $name = htmlspecialchars($_POST['productName']);
            $price = htmlspecialchars($_POST['price']);
            $discount = htmlspecialchars($_POST['discount']);
            $piece = htmlspecialchars($_POST['piece']);
            $description = htmlspecialchars($_POST['description']);
            $category = htmlspecialchars($_POST['category']);
            $status = htmlspecialchars($_POST['status']);

            $image = $this->productService->uploadImage($image);
            $result = $this->productService->addProduct($name, $description, $category, $price, $piece, $image, $status, $discount);

            if ($result) {
                header('Location: /admin/products');
            } else {
                echo "
                    <script>
                        alert('Gagal menambahkan product!');
                        window.location.href = '/admin/products';
                    </script>
                ";
            }
        } else {

            $model = [
                'title' => 'Add Product',
                'css' => 'addproduct'
            ];

            View::render('admin/products/add', $model);
            return;
        }
    }

    public function editproduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
            $image = $_FILES['uploadImage'];
            $name = htmlspecialchars($_POST['productName']);
            $price = htmlspecialchars($_POST['price']);
            $discount = htmlspecialchars($_POST['discount']);
            $piece = htmlspecialchars($_POST['piece']);
            $description = htmlspecialchars($_POST['description']);
            $category = htmlspecialchars($_POST['category']);
            $status = htmlspecialchars($_POST['status']);
            $lastImage = htmlspecialchars($_POST["lastImage"]);

            // cek apakah user memilih image baru
            if ($image['error'] === 4) {
                $image = $lastImage;
            } else {
                $image = $this->productService->uploadImage($image);
                
            }
            
            $result = $this->productService->updateProduct($id, $name, $description, $category, $price, $piece, $image, $status, $discount);

            if ($result) {
                echo "
                <script>
                    alert('Product successfully edited!');
                    window.location.href = '/admin/products';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Failed to edit product!');
                    window.location.href = '/admin/products';
                </script>
                ";
            }
        } else {
            $product = $this->productService->getProduct($id);
            $model = [
                'title' => 'Edit Product',
                'css' => 'addproduct',
                'product' => $product
            ];

            View::render('admin/products/edit', $model);
            return;
        }
    }

    public function removeproduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $result = $this->productService->removeProduct($id);
            if ($result) {
                echo "
                <script>
                    alert('Product successfully deleted!');
                    window.location.href = '/admin/products';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Failed to delete product!');
                    window.location.href = '/admin/products';
                </script>
                ";
            }
        }
    }

    public function draftproduct($id)
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $result = $this->productService->draftProduct($id);
            if ($result) {
                header('Location: /admin/products');
            } else {
                echo "
                    <script>
                        alert('Failed to update product!');
                        window.location.href = '/admin/products';
                    </script>
                ";
            }
        }
    }
}
<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\ProductService;
use Nuazsa\Nuacof\Services\CustomizeService;

class ProductsController
{
    private $productService;
    private $customizeService;

    private string $filter;
    private string $sort;
    private int $pagination;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->customizeService = new CustomizeService();
    }

    
    public function toTitleCase($string) {
        return ucwords(strtolower($string));
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

        $customizes = [];
        foreach ($product as $item) {
            $customizes[] = $this->customizeService->getCustomizeByIdProduct($item['id']);
        }

        $model = [
            'title' => 'Products',
            'css' => 'Products',
            'product' => $product,
            'customizes' => $customizes,
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
            $name = $this->toTitleCase(htmlspecialchars($_POST['productName']));
            $price = htmlspecialchars($_POST['price']);
            $discount = htmlspecialchars($_POST['discount']);
            $piece = htmlspecialchars($_POST['piece']);
            $description = $this->toTitleCase(htmlspecialchars($_POST['description']));
            $category = $this->toTitleCase(htmlspecialchars($_POST['category']));
            $status = $this->toTitleCase(htmlspecialchars($_POST['status']));

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

    public function editproduct($idProduct)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $image = $_FILES['uploadImage'];
            $name = $this->toTitleCase(htmlspecialchars($_POST['productName']));
            $price = htmlspecialchars($_POST['price']);
            $discount = htmlspecialchars($_POST['discount']);
            $piece = htmlspecialchars($_POST['piece']);
            $description = $this->toTitleCase(htmlspecialchars($_POST['description']));
            $category = $this->toTitleCase(htmlspecialchars($_POST['category']));
            $status = $this->toTitleCase(htmlspecialchars($_POST['status']));
            $lastImage = htmlspecialchars($_POST['lastImage']);

            // cek apakah user memilih image baru
            if ($image['error'] === 4) {
                $image = $lastImage;
            } else {
                $image = $this->productService->uploadImage($image);
                
            }
            
            $result = $this->productService->updateProduct($idProduct, $name, $description, $category, $price, $piece, $image, $status, $discount);

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
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customize'])) {
            $avalible = $this->toTitleCase(htmlspecialchars($_POST['avalibleCustomize']));
            $types = $_POST['customizeType'];
            $prices = $_POST['customizePrice'];

            $processedTypes = [];
            foreach ($types as $type) {
                $processedTypes[] = $this->toTitleCase(htmlspecialchars($type));
            }

            $processedPrices = [];
            foreach ($prices as $price) {
                $processedPrices[] = htmlspecialchars($price);
            }
            
            $result = $this->customizeService->addCustomize($idProduct, $avalible, $processedTypes, $processedPrices);

            if ($result) {
                echo "
                <script>
                    alert('Customize successfully edited!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Failed to edit customize!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            }
        } else {
            $product = $this->productService->getProduct($idProduct);
            $customizes = $this->customizeService->getCustomizeByIdProduct($idProduct);

            $options = [];
            foreach ($customizes as $customize) {
                $options[$customize['id']] = $this->customizeService->getCustomizeOption($customize['id']);
            }
            
            $model = [
                'title' => 'Edit Product',
                'css' => 'addproduct',
                'product' => $product,
                'customizes' => $customizes,
                'customizes_option' => $options
            ];

            View::render('admin/products/edit', $model);
            return;
        }
    } 

    public function editcustomize($idProduct, $idCustomize) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customize'])) {
            $avalible = $this->toTitleCase(htmlspecialchars($_POST['avalibleCustomize']));
            $types = $_POST['customizeType'];
            $prices = $_POST['customizePrice'];

            $processedTypes = [];
            foreach ($types as $type) {
                $processedTypes[] = $this->toTitleCase(htmlspecialchars($type));
            }

            $processedPrices = [];
            foreach ($prices as $price) {
                $processedPrices[] = htmlspecialchars($price);
            }
            
            $result = $this->customizeService->updateCustomize($idCustomize, $avalible, $processedTypes, $processedPrices);

            if ($result) {
                echo "
                <script>
                    alert('Customize successfully edited!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Failed to edit customize!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            }
        }

        if (isset($idCustomize)) {
            $customize = $this->customizeService->getCustomizeByIdProduct($idProduct);
            $customize_options = $this->customizeService->getCustomizeOption($idCustomize);

            $product = $this->productService->getProduct($idProduct);
            $customizes = $this->customizeService->getCustomizeByIdCustomize($idCustomize);
            // print_r($customizes); exit;
            
            $options = [];
            foreach ($customizes as $customize) {
                $options[$customize['id']] = $this->customizeService->getCustomizeOption($customize['id']);
            }
            
            $model = [
                'title' => 'Edit Product',
                'css' => 'addproduct',
                'product' => $product,
                'customize' => $customize,
                'customize_options' => $customize_options,
                'customizes' => $customizes,
                'customizes_option' => $options
            ];

            View::render('admin/products/edit', $model);
            return;
        }
    }

    public function removeproduct($idProduct)
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $result = $this->productService->removeProduct($idProduct);
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

    public function removecustomize($idProduct, $idCustomize)
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $result = $this->customizeService->removeCustomize($idCustomize);
            if ($result) {
                echo "
                <script>
                    alert('Customize successfully deleted!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Failed to delete customize!');
                    window.location.href = '/admin/editproduct/". $idProduct ."';
                </script>
                ";
            }
        }
    }

    public function draftproduct($idProduct)
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $result = $this->productService->draftProduct($idProduct);
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
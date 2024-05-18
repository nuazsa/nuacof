<?php

namespace Nuazsa\Nuacof\Services;

use Nuazsa\Nuacof\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    /**
     * Constructor for ProductRepository.
     *
     * @param ProductRepository $ProductRepository The repository for admin authentication.
     */
    public function __construct()
    {
        $this->productRepository = new ProductRepository;
    }

    public function getAllProduct($filter, $order, $pagination)
    {
        $id = $this->productRepository->getAllProduct($filter, $order, $pagination);
        return $id;
    }

    public function getProduct($id)
    {
        $id = $this->productRepository->getProductById($id);
        return $id;
    }

    public function countProduct()
    {
        $total = $this->productRepository->getTotalProduct();
        $total = $total['total'];
        return $total;
    }

    public function addProduct($name, $description, $category, $price, $piece, $image, $status, $discount)
    {
        return $this->productRepository->insertProduct($name, $description, $category, $price, $piece, $image, $status, $discount);
    }

    public function updateProduct($id, $name, $description, $category, $price, $piece, $image, $status, $discount)
    {
        return $this->productRepository->updateProduct($id, $name, $description, $category, $price, $piece, $image, $status, $discount);
    }

    public function draftProduct($id)
    {
        $product = $this->productRepository->getProductById($id);
        
        if ($product['status'] == 'active') {
            $status = 'draft';
        } else {
            $status = 'active';
        }

        return $this->productRepository->draftProduct($id, $status);
    }

    public function removeProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

    public function uploadImage($file)
    {
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $error = $file['error'];
        $tmpName = $file['tmp_name'];
    
        // Check if no image is uploaded
        if ($error === 4) {
            echo "
                <script>
                    alert('Select an image first');
                    window.location.href = '/admin/products';
                </script>
            ";
            exit;
        }
    
        // Check the uploaded image's extension
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
    
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "
                <script>
                    alert('Select an image with JPG, JPEG, or PNG format');
                    window.location.href = '/admin/products';
                </script>
            ";
            exit;
        }
    
        // Check the size of the uploaded image
        if ($fileSize > 1000000) {
            echo "
                <script>
                    alert('Image size is too large (maximum 1MB)');
                    window.location.href = '/admin/products';
                </script>
            ";
            exit;
        }
    
        // Generate a new name for the image file
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $imageExtension;
    
        // Move the image file to the destination location
        move_uploaded_file($tmpName,  $_SERVER['DOCUMENT_ROOT']  . '/images/uploads/products/' . $newFileName);
    
        return $newFileName;
    }    
}

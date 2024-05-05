<?php

namespace Nuazsa\Nuacof\Repositories;

use PDO;
use PDOException;
use Nuazsa\Nuacof\Config\Connection;

class ProductRepository
{
    private PDO $connection;

    /**
     * Constructor to inject the PDO connection.
     * @param PDO $connection The PDO connection object.
     */
    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function getAllProduct($filter = 'id', $order = 'DESC', $offset = 0)
    {
        try {
            $allowedColumns = ['id', 'name', 'category', 'name', 'price', 'piece', 'status', 'updatedAt'];
            $filter = in_array($filter, $allowedColumns) ? $filter : 'id';

            $order = in_array(strtoupper($order), ['ASC', 'DESC']) ? $order : 'DESC';

            $offset = filter_var($offset, FILTER_VALIDATE_INT);
            $offset = ($offset !== false && $offset > 0) ? $offset : 0;
    
            $sql = "SELECT * FROM products ORDER BY $filter $order, id DESC LIMIT 5 OFFSET $offset";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    public function getProductById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    public function getTotalProduct()
    {
        try {
            $stmt = $this->connection->prepare("SELECT count(*) as total FROM products");
            $stmt->execute();

            // var_dump($stmt->fetch()); exit;
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }
    

    public function insertProduct($name, $description, $category, $price, $piece, $image, $discount, $status)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO products (name, description, category, price, piece, image, discount, status) 
                                                VALUES (:name, :description, :category, :price, :piece, :image, :discount, :status)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':piece', $piece);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':discount', $discount);
            $stmt->bindParam(':status', $status);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    public function updateProduct($id, $name, $description, $category, $price, $piece, $image, $status, $discount = null)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE products 
            SET name = :name, 
                description = :description, 
                category = :category, 
                price = :price, 
                piece = :piece, 
                image = :image, 
                discount = :discount, 
                status = :status
            WHERE id = :id
            ");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':piece', $piece);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':discount', $discount, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    public function draftProduct(int $id, string $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE products SET status = :status WHERE id = :id");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    public function deleteProduct(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }
}

<?php

namespace Nuazsa\Nuacof\Repositories;

use PDO;
use PDOException;
use Nuazsa\Nuacof\Config\Connection;
use Exception;

class ProductRepository
{
    private PDO $connection;

    /**
     * Constructor to inject the PDO connection.
     */
    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    /**
     * Get all products with optional filtering and ordering.
     * @param string $filter The column to filter by.
     * @param string $order The order direction (ASC or DESC).
     * @param int $offset The offset for pagination.
     * @return array The product data.
     * @throws Exception If the query execution fails.
     */
    public function getAllProduct($filter = 'id', $order = 'DESC', $offset = 0)
    {
        try {
            $allowedColumns = ['id', 'name', 'category', 'price', 'piece', 'status', 'updatedAt'];
            $filter = in_array($filter, $allowedColumns) ? $filter : 'id';

            $order = in_array(strtoupper($order), ['ASC', 'DESC']) ? $order : 'DESC';

            $offset = filter_var($offset, FILTER_VALIDATE_INT);
            $offset = ($offset !== false && $offset >= 0) ? $offset : 0;

            $sql = "SELECT * FROM products ORDER BY $filter $order, id DESC LIMIT 5 OFFSET $offset";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Get product by ID.
     * @param int $id The product ID.
     * @return array The product data.
     * @throws Exception If the query execution fails.
     */
    public function getProductById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Get total number of products.
     * @return array The total number of products.
     * @throws Exception If the query execution fails.
     */
    public function getTotalProduct()
    {
        try {
            $stmt = $this->connection->prepare("SELECT count(*) as total FROM products");
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Insert a new product.
     * @param string $name The product name.
     * @param string $description The product description.
     * @param string $category The product category.
     * @param float $price The product price.
     * @param int $piece The product piece count.
     * @param string $image The product image URL.
     * @param float $discount The product discount.
     * @param string $status The product status.
     * @return bool True if the insertion is successful.
     * @throws Exception If the query execution fails.
     */
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
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Update an existing product.
     * @param int $id The product ID.
     * @param string $name The product name.
     * @param string $description The product description.
     * @param string $category The product category.
     * @param float $price The product price.
     * @param int $piece The product piece count.
     * @param string $image The product image URL.
     * @param string $status The product status.
     * @param float|null $discount The product discount.
     * @return bool True if the update is successful.
     * @throws Exception If the query execution fails.
     */
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
            WHERE id = :id");

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
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Update the status of a product to draft.
     * @param int $id The product ID.
     * @param string $status The new status.
     * @return bool True if the update is successful.
     * @throws Exception If the query execution fails.
     */
    public function draftProduct(int $id, string $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE products SET status = :status WHERE id = :id");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Delete a product by ID.
     * @param int $id The product ID.
     * @return bool True if the deletion is successful.
     * @throws Exception If the query execution fails.
     */
    public function deleteProduct(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
        } catch (\Throwable $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }
}


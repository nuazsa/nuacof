<?php

namespace Nuazsa\Nuacof\Repositories;

use PDO;
use Exception;
use PDOException;
use Nuazsa\Nuacof\Config\Connection;

class OrderRepository
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

    public function getAllOrder($filter = 'createdAt', $order = 'DESC', $offset = 0)
    {
        try {
            $allowedColumns = ['createdAt', 'updatedAt'];
            $filter = in_array($filter, $allowedColumns) ? $filter : 'createdAt';

            $order = in_array(strtoupper($order), ['ASC', 'DESC']) ? $order : 'DESC';

            $offset = filter_var($offset, FILTER_VALIDATE_INT);
            $offset = ($offset !== false && $offset >= 0) ? $offset : 0;
            
            $sql = "SELECT * FROM orders ORDER BY $filter $order, createdAt DESC LIMIT 5 OFFSET $offset";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    public function updateStatus($idTransaction, $status) 
    {
        try {
            $stmt = $this->connection->prepare("UPDATE orders SET status = :status WHERE idTransaction = :idTransaction");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':idTransaction', $idTransaction);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }
}

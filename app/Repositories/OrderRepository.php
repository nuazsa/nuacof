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

    public function getAllOrder()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders");
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

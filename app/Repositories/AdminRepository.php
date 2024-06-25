<?php

namespace Nuazsa\Nuacof\Repositories;

use PDO;
use PDOException;
use Nuazsa\Nuacof\Config\Connection;
use Exception;

/**
 * Repository class for admin authentication related database operations.
 */
class AdminRepository
{
    private $connection;

    /**
     * Constructor to inject the PDO connection.
     * @param PDO $connection The PDO connection object.
     */
    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    /**
     * Finds an admin by email.
     * @param string $email The email of the admin.
     * @return array|null Returns the admin data if found, otherwise returns null.
     * @throws Exception If there is an error executing the query.
     */
    public function findByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM admin WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Updates the password and token for the given email.
     * @param string $email The email of the admin.
     * @param string $password The new password for the admin.
     * @param string $token The token for verifying the password change.
     * @throws Exception If there is an error executing the query.
     */
    public function updatePasswordAndToken($email, $password, $token)
    {
        try {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $this->connection->prepare("UPDATE `admin` SET `password`= :password, `tokenVerified`= null WHERE email = :email AND tokenVerified = :token");
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            // You may want to return the updated admin data here if needed
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Updates the status for the given email.
     * @param string $email The email of the admin.
     * @param string $status The new status for the admin.
     * @throws Exception If there is an error executing the query.
     */
    public function updateStatus($email, $status)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `admin` SET `status`= :status WHERE email = :email");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // You may want to return the updated admin data here if needed
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }
}

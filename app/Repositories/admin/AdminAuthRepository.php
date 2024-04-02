<?php

namespace Nuazsa\Nuacof\Repositories\admin;

use PDO;
use PDOException;

/**
 * Repository class for admin authentication related database operations.
 */
class AdminAuthRepository
{
    private $connection;

    /**
     * Constructor to inject the PDO connection.
     * @param PDO $connection The PDO connection object.
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
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

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    /**
     * Gets the token for the given email.
     * @param string $email The email of the admin.
     * @return array|null Returns the token if found, otherwise returns null.
     * @throws Exception If there is an error executing the query.
     */
    public function getTokenVerified($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT tokenVerified FROM admin WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }

    /**
     * Removes the token for the given email.
     * @param string $email The email of the admin.
     * @throws Exception If there is an error executing the query.
     */
    public function removeToken($email)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `admin` SET `tokenVerified`= null WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
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

            $stmt = $this->connection->prepare("UPDATE `admin` SET `password`= :password WHERE email = :email AND tokenVerified = :token");
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->execute();


            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }
}

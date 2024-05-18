<?php
namespace Nuazsa\Nuacof\Repositories;

use PDO;
use Exception;
use Throwable;
use PDOException;

class CustomizeRepository
{
    private PDO $connection;

    /**
     * Constructor to inject the PDO connection.
     * @param PDO $connection The PDO connection object.
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get customize data by product ID.
     * @param int $idProduct The product ID.
     * @return array The customize data.
     * @throws Exception If the query execution fails.
     */
    public function getCustomizeByIdProduct($idProduct)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM customize WHERE idProduct = :idProduct");
            $stmt->bindParam(':idProduct', $idProduct);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Get customize data by customize ID.
     * @param int $idCustomize The customize ID.
     * @return array The customize data.
     * @throws Exception If the query execution fails.
     */
    public function getCustomizeByIdCustomize($idCustomize)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM customize WHERE id = :idCustomize");
            $stmt->bindParam(':idCustomize', $idCustomize);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Get customize options by customize option ID.
     * @param int $idCustomizeOption The customize option ID.
     * @return array The customize options.
     * @throws Exception If the query execution fails.
     */
    public function getCustomizeOption($idCustomizeOption)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM customize_options WHERE idCustomizeOption = :idCustomizeOption");
            $stmt->bindParam(':idCustomizeOption', $idCustomizeOption);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Insert a new customize record.
     * @param int $idProduct The product ID.
     * @param string $name The customize name.
     * @return int The new customize option ID.
     * @throws Exception If the query execution fails.
     */
    public function insertCustomize($idProduct, $name)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO customize (idProduct, name) VALUES (:idProduct, :name)");
            $stmt->bindParam(':idProduct', $idProduct);
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            // Get the last inserted ID for customize_option
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Insert multiple customize options.
     * @param int $idCustomizeOption The customize option ID.
     * @param array $types The customize types.
     * @param array $prices The customize prices.
     * @return bool True if all data is successfully inserted.
     * @throws Exception If the query execution fails.
     */
    public function insertCustomizeOption($idCustomizeOption, $types, $prices)
    {
        try {
            if (count($types) != count($prices)) {
                throw new Exception("The number of elements in \$types and \$prices must be the same.");
            }

            for ($i = 0; $i < count($types); $i++) {
                $stmt = $this->connection->prepare("INSERT INTO customize_options (idCustomizeOption, value, price) VALUES (:idCustomizeOption, :value, :price)");
                $stmt->bindParam(':idCustomizeOption', $idCustomizeOption);
                $stmt->bindParam(':value', $types[$i]);
                $stmt->bindParam(':price', $prices[$i]);
                $stmt->execute();
            }

            return true;
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Update customize name.
     * @param int $idCustomize The customize ID.
     * @param string $name The new customize name.
     * @return bool True if the update is successful.
     * @throws Exception If the query execution fails.
     */
    public function updateCustomize($idCustomize, $name)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE customize SET name = :name WHERE id = :idCustomize");
            $stmt->bindParam(':idCustomize', $idCustomize);
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Update multiple customize options.
     * @param array $idCustomizeOption The array of customize option IDs.
     * @param array $types The customize types.
     * @param array $prices The customize prices.
     * @return bool True if all data is successfully updated.
     * @throws Exception If the query execution fails.
     */
    public function updateCustomizeOption($idCustomizeOption, $types, $prices)
    {
        try {
            if (count($types) != count($prices)) {
                throw new Exception("The number of elements in \$types and \$prices must be the same.");
            }

            for ($i = 0; $i < count($types); $i++) {
                $stmt = $this->connection->prepare("UPDATE customize_options SET value = :value, price = :price WHERE id = :id");
                $stmt->bindParam(':id', $idCustomizeOption[$i]['id']);
                $stmt->bindParam(':value', $types[$i]);
                $stmt->bindParam(':price', $prices[$i]);

                if (!$stmt->execute()) {
                    throw new Exception("Failed to update customize option with ID: " . $idCustomizeOption[$i]['id']);
                }
            }

            return true;
        } catch (PDOException $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Delete a customize record by ID.
     * @param int $idCustomize The customize ID.
     * @return bool True if the deletion is successful.
     * @throws Exception If the query execution fails.
     */
    public function deleteCustomize($idCustomize)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM customize WHERE id = :idCustomize");
            $stmt->bindParam(':idCustomize', $idCustomize);

            return $stmt->execute();
        } catch (Throwable $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }

    /**
     * Delete customize options by customize option ID.
     * @param int $idCustomizeOption The customize option ID.
     * @return bool True if the deletion is successful.
     * @throws Exception If the query execution fails.
     */
    public function deleteCustomizeOption($idCustomizeOption)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM customize_options WHERE idCustomizeOption = :idCustomizeOption");
            $stmt->bindParam(':idCustomizeOption', $idCustomizeOption);

            return $stmt->execute();
        } catch (Throwable $e) {
            throw new Exception("Failed to execute query: " . $e->getMessage());
        }
    }
}

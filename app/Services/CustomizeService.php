<?php

namespace Nuazsa\Nuacof\Services;

use PDO;
use Exception;
use Nuazsa\Nuacof\Config\Connection;
use Nuazsa\Nuacof\Repositories\CustomizeRepository;

class CustomizeService
{
    protected $connection;
    protected $CustomizeRepository;

    /**
     * Constructor for CustomizeService.
     *
     * @param CustomizeRepository $CustomizeRepository The repository for admin authentication.
     */
    public function __construct()
    {
        $this->connection = Connection::getConnection();
        $this->CustomizeRepository = new CustomizeRepository($this->connection);
    }

    public function getCustomizeByIdProduct($idProduct)
    {
        $id = $this->CustomizeRepository->getCustomizeByIdProduct($idProduct);
        return $id;
    }

    public function getCustomizeByIdCustomize($idCusgetCustomizeByIdCustomize)
    {
        $id = $this->CustomizeRepository->getCustomizeByIdCustomize($idCusgetCustomizeByIdCustomize);
        return $id;
    }

    public function getCustomizeOption($idCustomize)
    {
        $id = $this->CustomizeRepository->getCustomizeOption($idCustomize);
        return $id;
    }

    public function addCustomize($idProduct, $name, $processedTypes, $processedPrices)
    {
        try {
            // Memulai transaksi
            $this->connection->beginTransaction();

            // Lakukan operasi-insert dalam transaksi
            $id = $this->CustomizeRepository->insertCustomize($idProduct, $name);
            $this->CustomizeRepository->insertCustomizeOption($id, $processedTypes, $processedPrices);

            // Jika semuanya sukses, commit transaksi
            $result = $this->connection->commit();
            return $result;
        } catch (Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi
            $this->connection->rollBack();
            echo "Failed: " . $e->getMessage();
        }
        // return $this->CustomizeRepository->insertCustomize($idProduct, $name);
    }

    public function updateCustomize($idCustomize, $name, $processedTypes, $processedPrices)
    {
        try {
            $idCustomizeOption = $this->getCustomizeOption($idCustomize);
            // Memulai transaksi
            $this->connection->beginTransaction();

            // Lakukan operasi-insert dalam transaksi
            $this->CustomizeRepository->updateCustomize($idCustomize, $name);
            $this->CustomizeRepository->updateCustomizeOption($idCustomizeOption, $processedTypes, $processedPrices);

            // Jika semuanya sukses, commit transaksi
            $result = $this->connection->commit();
            return $result;
        } catch (Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi
            $this->connection->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }

    public function removeCustomize($idCustomize)
    {
        try {
            // Memulai transaksi
            $this->connection->beginTransaction();

            // Lakukan operasi-insert dalam transaksi
            $this->CustomizeRepository->deleteCustomize($idCustomize);
            $this->CustomizeRepository->deleteCustomizeOption($idCustomize);

            // Jika semuanya sukses, commit transaksi
            $result = $this->connection->commit();
            return $result;
        } catch (Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi
            $this->connection->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }
}

<?php

namespace Nuazsa\Nuacof\Services\admin;

use Exception;
use Nuazsa\Nuacof\Config\Connection;
use Nuazsa\Nuacof\Repositories\admin\AdminAuthRepository;

/**
 * Service class for handling admin authentication logic.
 */
class AdminAuthService
{
    protected $AdminAuthRepository;

    /**
     * Constructor for AdminAuthService.
     *
     * @param AdminAuthRepository $AdminAuthRepository The repository for admin authentication.
     */
    public function __construct()
    {
        $this->AdminAuthRepository = new AdminAuthRepository;
    }

    /**
     * Authenticates an admin with the provided email and password.
     *
     * @param string $email    The admin's email.
     * @param string $password The admin's password.
     *
     * @return array|null The authenticated admin's data, or null if authentication fails.
     */
    public function signin($email, $password)
    {
        $admin = $this->AdminAuthRepository->findByEmail($email);

        $status = "active";
        $this->AdminAuthRepository->updateStatus($email, $status);

        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }

        return null;
    }

    public function logout($email) 
    {
        $status = "not active";
        $this->AdminAuthRepository->updateStatus($email, $status);
    }

    public function getByEmail($email){
        $id = $this->AdminAuthRepository->findByEmail($email);
        return $id;
    }

    /**
     * Checks if the token for the given email is valid.
     *
     * @param string $email The admin's email.
     *
     * @return array|null The token data, or null if the token is invalid or not found.
     */
    public function checkToken($email)
    {
        $token = $this->AdminAuthRepository->findByEmail($email);

        if ($token && $token['tokenVerified']) {
            return $token;
        }

        return null;
    }

    /**
     * Updates the admin's password and removes the token.
     * @param string $email The email of the admin.
     * @param string $password The new password for the admin.
     * @param string $token The token for verifying the password change.
     * @return bool|null Returns true if the password is updated successfully, otherwise returns null.
     */
    public function updatePassword($email, $password, $token)
    {
        try {
            $token_data = $this->checkToken($email);
            if ($token_data && $token == $token_data['tokenVerified']) {
                $this->AdminAuthRepository->updatePasswordAndToken($email, $password, $token);
                return true;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
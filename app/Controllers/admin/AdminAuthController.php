<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Exception;
use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Config\Connection;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;
use Nuazsa\Nuacof\Repositories\admin\AdminAuthRepository;

class AdminAuthController
{
    private $authService;

    /**
     * AdminAuthController constructor.
     * Initializes the AdminAuthService for handling authentication tasks.
     */
    public function __construct()
    {
        $connection = Connection::getConnection();
        $authRepository = new AdminAuthRepository($connection);
        $this->authService = new AdminAuthService($authRepository);

        $connection = null;
    }

    /**
     * Handles the admin signup process.
     * Validates input data, creates a new admin account, and redirects to the signin page.
     */
    public function signup()
    {
        $error = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $repeat_password = htmlspecialchars($_POST['repeat_password']);
            $token = htmlspecialchars($_POST['token']);

            if ($password == $repeat_password) {
                $updatePassword = $this->authService->updatePassword($email, $password, $token);

                if ($updatePassword == null) {
                    $error = 'Token tidak cocok!';
                } else {
                    header('Location: /admin/signin');
                }
            } else {
                $error = 'Password tidak sama!';
            }
        }

        $model = [
            'title' => 'SignUp',
            'error' => $error
        ];

        View::render('admin/auth', $model);
    }

    /**
     * Handles the admin signin process.
     * Validates the credentials, starts a session for the admin, and redirects to the dashboard.
     */
    public function signin()
    {
        $error = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $token = $this->authService->checkToken($email);

            if ($token == null) {
                try {
                    $admin = $this->authService->signin($email, $password);

                    if ($admin) {
                        session_start();
                        $_SESSION['admin_email'] = $admin['email'];
                        header('Location: /admin/dashboard');
                        exit();
                    } else {
                        $error = 'Email/Password Salah!';
                    }
                } catch (Exception $e) {
                    $error = 'Terjadi kesalahan: ' . $e->getMessage();
                }
            } else {
                $error = 'Token belum di aktivasi!';
            }
        }

        $model = [
            'title' => 'SignIn',
            'error' => $error
        ];

        View::render('admin/auth', $model);
    }

    /**
     * Handles the admin logout process.
     * Destroys the session and removes the session cookie.
     */
    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();

        // Opsional: Hapus cookie sesi jika ada
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        header("Location: /admin/signin");
    }
}

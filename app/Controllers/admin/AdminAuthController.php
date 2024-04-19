<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Exception;
use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\admin\AdminAuthService;

class AdminAuthController
{
    private $authService;

    /**
     * AdminAuthController constructor.
     * Initializes the AdminAuthService for handling authentication tasks.
     */
    public function __construct()
    {
        $this->authService = new AdminAuthService();
    }

    /**
     * Handles the admin signup process.
     * Validates input data, creates a new admin account, and redirects to the signin page.
     */
    public function signup()
    {
        session_start();
        if (isset($_SESSION['admin_email'])) {
            header('Location: /admin/dashboard');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {
            $model = ['title' => 'SignUp'];
            View::render('admin/auth', $model);
            return;
        }
    
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $repeat_password = htmlspecialchars($_POST['repeat_password']);
        $token = htmlspecialchars($_POST['token']);
    
        if ($password != $repeat_password) {
            $model = ['title' => 'SignUp', 'error' => 'Password tidak sama!'];
            View::render('admin/auth', $model);
            return;
        }
    
        $updatePassword = $this->authService->updatePassword($email, $password, $token);
    
        if ($updatePassword == null) {
            $model = ['title' => 'SignUp', 'error' => 'Token tidak cocok!'];
            View::render('admin/auth', $model);
            return;
        }
    
        header('Location: /admin/signin');
    }
    

    /**
     * Handles the admin signin process.
     * Validates the credentials, starts a session for the admin, and redirects to the dashboard.
     */
    public function signin()
    {   
        session_start();
        if (isset($_SESSION['admin_email'])) {
            header('Location: /admin/dashboard');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {
            $model = ['title' => 'SignIn'];
            View::render('admin/auth', $model);
            return;
        }
    
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        $token = $this->authService->checkToken($email);

        if ($token != null) {
            $model = ['title' => 'SignIn', 'error' => 'Token belum di aktivasi!'];
            View::render('admin/auth', $model);
            return;
        }
    
        $admin = $this->authService->signin($email, $password);
    
        if (!$admin) {
            $model = ['title' => 'SignIn', 'error' => 'Email/Password Salah!'];
            View::render('admin/auth', $model);
            return;
        }
    
        $_SESSION['admin_email'] = $admin['email'];
        header('Location: /admin/dashboard');
        exit();
    }

    /**
     * Handles the admin logout process.
     * Destroys the session and removes the session cookie.
     */
    public function logout()
    {
        session_start();

        $this->authService->logout($_SESSION['admin_email']);
        
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

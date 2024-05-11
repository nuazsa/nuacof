<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\AdminAuthService;

class UserController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AdminAuthService;
    }

    public function standings() 
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {

            $model = [
                'title' => 'Standings',
                'css' => 'standings'
            ];

            View::render('admin/standings', $model);
            return;
        }
    }
}
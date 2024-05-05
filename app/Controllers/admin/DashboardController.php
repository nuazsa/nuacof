<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;

class DashboardController
{

    public function __construct()
    {
    }

    public function index() 
    {

        $model = [
            'title' => 'Dashboard',
        ];

        View::render('admin/dashboard', $model);
    }
}


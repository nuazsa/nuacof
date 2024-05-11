<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;

class ManagerController
{
    public function __construct()
    {
    }

    public function index()
    {

        $model = [
            'title' => 'Manager',
            'css' => 'manager'
        ];
        view::render('admin/manager', $model);
    }
}

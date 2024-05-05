<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;

class OrdersController
{
    public function __construct()
    {
    }

    public function index()
    {
        $model = [
            'title' => 'Orders',
            'action' => 'Date'
        ];
        view::render('admin/orders', $model);
    }
}

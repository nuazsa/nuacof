<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;

class UiController
{

    public function __construct()
    {
    }

    public function index()
    {

        $model = [
            'title' => 'UI',
        ];

        View::render('admin/ui', $model);
    }
}

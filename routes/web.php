<?php

use Nuazsa\Nuacof\Controllers\admin\DashboardController;
use Nuazsa\Nuacof\Router;

// Define routes
Router::get('/', DashboardController::class, 'index');

// Running the router to handle requests
Router::run();
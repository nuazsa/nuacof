<?php

use Nuazsa\Nuacof\Router;
use Nuazsa\Nuacof\Controllers\admin\UiController;
use Nuazsa\Nuacof\Controllers\admin\OrdersController;
use Nuazsa\Nuacof\Controllers\admin\ManagerController;
use Nuazsa\Nuacof\Controllers\admin\ProductsController;
use Nuazsa\Nuacof\Controllers\admin\AdminAuthController;
use Nuazsa\Nuacof\Controllers\admin\DashboardController;
use Nuazsa\Nuacof\Controllers\admin\UserController;

// Define routes
Router::prefix('/admin', function() {
    Router::get('/', DashboardController::class, 'index');

    Router::get('/signup', AdminAuthController::class, 'signup');
    Router::post('/signup', AdminAuthController::class, 'signup');

    Router::get('/signin', AdminAuthController::class, 'signin');
    Router::post('/signin', AdminAuthController::class, 'signin');

    Router::get('/logout', AdminAuthController::class, 'logout');

    Router::get('/dashboard', DashboardController::class, 'index');
    
    Router::get('/products', ProductsController::class, 'index');

    Router::get('/orders', OrdersController::class, 'index');

    Router::get('/ui', UiController::class, 'index');

    Router::get('/manager', ManagerController::class, 'index');

    Router::get('/standings', UserController::class, 'standings');
});

// Running the router to handle requests
Router::run();
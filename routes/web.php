<?php

use Nuazsa\Nuacof\Router;
use Nuazsa\Nuacof\Controllers\admin\OrdersController;
use Nuazsa\Nuacof\Controllers\admin\ProductsController;
use Nuazsa\Nuacof\Controllers\admin\AdminAuthController;
use Nuazsa\Nuacof\Controllers\admin\DashboardController;

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
});

// Running the router to handle requests
Router::run();
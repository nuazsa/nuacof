<?php

use Nuazsa\Nuacof\Router;
use Nuazsa\Nuacof\Controllers\admin\UiController;
use Nuazsa\Nuacof\Middleware\AdminAuthMiddleware;
use Nuazsa\Nuacof\Controllers\admin\UserController;
use Nuazsa\Nuacof\Controllers\admin\OrdersController;
use Nuazsa\Nuacof\Controllers\admin\ManagerController;
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

    Router::get('/dashboard', DashboardController::class, 'index', [AdminAuthMiddleware::class]);
    
    Router::get('/products', ProductsController::class, 'index', [AdminAuthMiddleware::class]);
    Router::get('/addproduct', ProductsController::class, 'addproduct', [AdminAuthMiddleware::class]);
    Router::post('/addproduct', ProductsController::class, 'addproduct', [AdminAuthMiddleware::class]);
    Router::get('/editproduct', ProductsController::class, 'editproduct', [AdminAuthMiddleware::class]);

    Router::get('/orders', OrdersController::class, 'index', [AdminAuthMiddleware::class]);

    Router::get('/ui', UiController::class, 'index', [AdminAuthMiddleware::class]);

    Router::get('/manager', ManagerController::class, 'index', [AdminAuthMiddleware::class]);

    Router::get('/standings', UserController::class, 'standings', [AdminAuthMiddleware::class]);
});

// Running the router to handle requests
Router::run();
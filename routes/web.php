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


/**
 * Define routes
 * Prefix for admin
 */
Router::prefix('/admin', function() {
    /**
     * Authentication
     */
    Router::get('/signup', AdminAuthController::class, 'signup');
    Router::post('/signup', AdminAuthController::class, 'signup');
    Router::get('/signin', AdminAuthController::class, 'signin');
    Router::post('/signin', AdminAuthController::class, 'signin');
    Router::get('/logout', AdminAuthController::class, 'logout');

    /**
     * Dashboard
     */
    Router::get('/dashboard', DashboardController::class, 'index', [AdminAuthMiddleware::class]);
    
    /**
     * Products
     */
    Router::get('/products', ProductsController::class, 'index', [AdminAuthMiddleware::class]);
    Router::post('/products', ProductsController::class, 'index', [AdminAuthMiddleware::class]);
    Router::get('/addproduct', ProductsController::class, 'addproduct', [AdminAuthMiddleware::class]);
    Router::post('/addproduct', ProductsController::class, 'addproduct', [AdminAuthMiddleware::class]);
    Router::get('/editproduct/([0-9]*)', ProductsController::class, 'editproduct', [AdminAuthMiddleware::class]);
    Router::get('/editproduct/([0-9]*)/([0-9]*)', ProductsController::class, 'editcustomize', [AdminAuthMiddleware::class]);
    Router::post('/editproduct/([0-9]*)/([0-9]*)', ProductsController::class, 'editcustomize', [AdminAuthMiddleware::class]);
    Router::post('/editproduct/([0-9]*)', ProductsController::class, 'editproduct', [AdminAuthMiddleware::class]);
    Router::get('/removeproduct/([0-9]*)', ProductsController::class, 'removeproduct', [AdminAuthMiddleware::class]);
    Router::get('/removecustomize/([0-9]*)/([0-9]*)', ProductsController::class, 'removecustomize', [AdminAuthMiddleware::class]);
    Router::get('/draftproduct/([0-9]*)', ProductsController::class, 'draftproduct', [AdminAuthMiddleware::class]);

    /**
     * Orders
     */
    Router::get('/orders', OrdersController::class, 'index', [AdminAuthMiddleware::class]);
    Router::get('/completeorder/([0-9]*)', OrdersController::class, 'completeorder', [AdminAuthMiddleware::class]);
    Router::get('/vieworder/([0-9]*)', OrdersController::class, 'vieworder', [AdminAuthMiddleware::class]);

    Router::get('/ui', UiController::class, 'index', [AdminAuthMiddleware::class]);

    Router::get('/manager', ManagerController::class, 'index', [AdminAuthMiddleware::class]);

    Router::get('/standings', UserController::class, 'standings', [AdminAuthMiddleware::class]);
});

// Running the router to handle requests
Router::run();

// ([0-9a-zA-Z]*)/([0-9]*) regex
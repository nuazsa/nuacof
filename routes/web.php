<?php

use Nuazsa\Nuacof\Controllers\admin\AdminAuthController;
use Nuazsa\Nuacof\Controllers\admin\DashboardController;
use Nuazsa\Nuacof\Router;

// Define routes
Router::prefix('/admin', function() {
    Router::get('/', DashboardController::class, 'index');

    Router::get('/signup', AdminAuthController::class, 'signup');
    Router::post('/signup', AdminAuthController::class, 'signup');

    Router::get('/signin', AdminAuthController::class, 'signin');
    Router::post('/signin', AdminAuthController::class, 'signin');

    Router::get('/dashboard', DashboardController::class, 'index');
    Router::get('/logout', AdminAuthController::class, 'logout');
});

// Running the router to handle requests
Router::run();
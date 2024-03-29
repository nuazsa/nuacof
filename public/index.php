<?php

// Set error reporting to display all errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Check if the autoload file exists
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    die('Autoload file not found. Please run composer install.');
}

// Include the autoload file
require_once $autoloadPath;

// Check if the routes file exists
$routesPath = __DIR__ . '/../routes/web.php';
if (!file_exists($routesPath)) {
    die('Routes file not found.');
}

// Include the routes file
require_once $routesPath;

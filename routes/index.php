<?php

use function src\slimConfiguration;
use App\Controllers\ProductController;

$app = new \Slim\App(slimConfiguration());

// =============================================

//$app->get('/', 'App\Controllers\ProductController:getProducts');
$app->get('/', ProductController::class .':getProducts');


// =============================================
$app->run();

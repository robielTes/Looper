<?php

use App\Application;
use App\Controllers\HomeController;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));


$app->router->get('/', [HomeController::class, 'home']);

$app->router->get('/take', [HomeController::class, 'take']);

$app->router->get('/create',[HomeController::class, 'create']);

$app->router->get('/manage', [HomeController::class, 'manage']);


$app->run();
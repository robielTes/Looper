<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

$settings = require __DIR__ .'/../app/settings.php';
$settings($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require __DIR__ .'/../app/middleware.php';
$middleware($app);



/*$app ->get('/', '\App\Controllers\HomeController@home');
$app ->get('/take', '\App\Controllers\HomeController@take');
$app ->get('/create', '\App\Controllers\HomeController@create');
$app ->get('/manage', '\App\Controllers\HomeController@manage');*/


$app ->get('/', function(Request $request, Response $response) {
    $response->getBody()->write('Hello World!');
    return $response;
});


$app ->run();
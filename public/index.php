<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

/*$app ->get('/', '\App\Controllers\HomeController@home');
$app ->get('/take', '\App\Controllers\HomeController@take');
$app ->get('/create', '\App\Controllers\HomeController@create');
$app ->get('/manage', '\App\Controllers\HomeController@manage');*/


$app ->get('/', function(Request $request, Response $response) {
    $response->getBody()->write('Hello World!');
    return $response;
});


$app ->run();
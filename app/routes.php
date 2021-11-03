<?php

use Slim\App;
use App\Http\Controllers\WelcomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {



    /*$app ->get('/', '\App\Controllers\HomeController@home');
    $app ->get('/take', '\App\Controllers\HomeController@take');
    $app ->get('/create', '\App\Controllers\HomeController@create');
    $app ->get('/manage', '\App\Controllers\HomeController@manage');*/

    $app ->get('/home', function(Request $request, Response $response) {
        $name = 'Looper';
        return view($response,'auth.home',compact('name'));
    });

    $app ->get('/', [WelcomeController::class, 'index']);
    $app ->get('/{name}/{age}', [WelcomeController::class, 'show']);


};
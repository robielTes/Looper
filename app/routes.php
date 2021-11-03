<?php

use Slim\App;
use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {



    /*$app ->get('/', '\App\Controllers\HomeController@home');
    $app ->get('/take', '\App\Controllers\HomeController@take');
    $app ->get('/create', '\App\Controllers\HomeController@create');
    $app ->get('/manage', '\App\Controllers\HomeController@manage');*/

    function view(Response $response, $template, $args = []){
        $cache = __DIR__ .'/../cache';
        $views = __DIR__ . '/../resources/views';

        $blade = (new Blade($views,$cache))->make($template,$args);
        $response->getBody()->write($blade->render());
        return $response;
    }

    $app ->get('/home', function(Request $request, Response $response,$args) {
        $name = 'Looper';
        return view($response,'auth.home',compact('name'));
    });

    $app ->get('/', function(Request $request, Response $response, $args) {
        $response->getBody()->write('Hello World!');
        return $response;
    });


};
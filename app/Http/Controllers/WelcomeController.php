<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController
{

    public function index($response): Response
    {
        $response->getBody()->write('Welcome Controller Worked!');
        return $response;
    }

    public function show($response,$name, $age): Response
    {

        $response->getBody()->write("Welcome {$name} how is {$age} years old");
        return $response;
    }
}
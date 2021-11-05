<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController
{
    public function home(View $view): Response
    {
        return $view('home');
    }
}


<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController
{

    /**
     * @param View $view
     * @return Response
     * return to home page
     */
    public function home(View $view): Response
    {
        return $view('home');
    }
}

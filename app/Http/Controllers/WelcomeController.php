<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;

class WelcomeController
{

    public function index(View $view): Response
    {
        $name = 'Robiel';
        return $view('auth.home',compact('name'));
    }

    public function show(View $view,$name, $age): Response
    {
        return $view('user.show',compact('name','age'));
    }
    public function delete(View $view,$name): Response
    {
        return $view('user.delete',compact('name','name'));
    }
}
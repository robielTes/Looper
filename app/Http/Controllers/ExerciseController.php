<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;

class ExerciseController
{
    public function take(View $view): Response
    {
        $title = '';
        $color = 'purple';
        return $view('main.take',compact('title','color'));
    }

    public function create(View $view): Response
    {
        $title = 'New exercise';
        $color = 'yellow';
        return $view('main.create',compact('title','color'));
    }
    public function manage(View $view): Response
    {
        $title = '';
        $color = 'green';
        return $view('main.manage',compact('title','color'));
    }
}

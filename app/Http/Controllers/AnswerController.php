<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;

class AnswerController
{
    public function create(View $view,$id): Response
    {
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.create',compact('title','color','exercise'));
    }
    public function edit(View $view,$id): Response
    {
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.edit',compact('title','color','exercise'));
    }
}

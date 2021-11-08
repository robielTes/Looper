<?php

namespace App\Http\Controllers;

use App\Support\View;
use App\Support\Redirect;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Line;

class ExerciseController
{
    public function take(View $view): Response
    {
        $title = '';
        $color = 'purple';
        $exercises = Exercise::all();
        return $view('exercises.take',compact('title','color','exercises'));
    }

    public function create(View $view): Response
    {
        $title = 'New exercise';
        $color = 'yellow';
        return $view('exercises.create',compact('title','color'));
    }
    public function manage(View $view): Response
    {
        $title = '';
        $color = 'green';
        $exercises = Exercise::all();
        return $view('exercises.manage',compact('title','color','exercises'));
    }
    public function store(View $view): Response
    {
        $title = $_REQUEST['title'];
        $color = 'yellow';
        Exercise::make(['title'=>$title,'states_id'=>1])->create();
        return $view('fields.create',compact('title','color'));
    }
}

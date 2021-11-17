<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Answer;

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
        foreach ($_POST as $key=>$value){
            Answer::make(['answer'=>$value,'field_id'=>$key,'exercise_id'=>$id])->create();
        }
        $inputData = $_REQUEST;
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.edit',compact('title','color','exercise','inputData'));
    }

    public function index(View $view,$id): Response
    {
        $answers = Answer::where('exercise_id',$id);
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'green';
        return $view('answers.index',compact('title','color','exercise', 'answers'));
    }
}

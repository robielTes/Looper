<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Field;
use App\Models\Line;
use App\Models\State;

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
        $last = array_key_last(Exercise::all())+2;
        return $view('exercises.create',compact('title','color','last'));
    }
    public function manage(View $view): Response
    {
        $title = '';
        $color = 'green';
        $exercises = Exercise::all();
        return $view('exercises.manage',compact('title','color','exercises'));
    }
    public function store(View $view ,$id): Response
    {
        $lines = Line::all();
        $title = $_REQUEST['title'];
        $color = 'yellow';
        Exercise::make(['title'=>$title,'states_id'=>1])->create();
        return $view('fields.create',compact('title','color','lines'));
    }

    public function show(View $view ,$id): Response
    {
        $lines = Line::all();
        $exercise = Exercise::find($id);
        $color = 'yellow';
        $title = $exercise->title;
        return $view('fields.create',compact('title','exercise','color','lines'));
    }

    public function update(View $view,$id): Response
    {
        $exercise = Exercise::find($id);
        $exercise->state_id += 1 ;
        $exercise->save();

        $title = '';
        $color = 'green';
        $exercises = Exercise::all();
        return $view('exercises.manage',compact('title','color','exercises'));
    }
}

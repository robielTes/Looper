<?php

namespace App\Http\Controllers;

use App\Support\View;
use phpDocumentor\Reflection\File;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Answer;
use App\Models\Field;

class AnswerController
{
    public function index(View $view,$id): Response
    {
        $answers = [];
        $time =null;
        foreach (Answer::where('exercise_id',$id) as $answer){
            if($time === $answer->take){
                continue;
            }
            array_push($answers,$answer);
            $time = $answer->take;
        }

        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'green';
        return $view('answers.index',compact('title','color', 'exercise', 'answers'));
    }

    public function show(View $view,$id,$rid): Response
    {
        $field = Field::find($rid);
        $answers = [];
        $time =null;
        foreach (Answer::where('field_id',$rid) as $answer){
            if($answer->field_id == $rid){
                if($time === $answer->take){
                    continue;
                }
                array_push($answers,$answer);
                $time = $answer->take;
            }
        }

        $title = Exercise::find($id)->title;
        $color = 'green';
        return $view('answers.show',compact('title','color', 'field', 'answers'));
    }

    public function create(View $view,$id): Response
    {
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.create',compact('title','color', 'exercise'));
    }

    public function edit(View $view,$id): Response
    {
        $ids = [];
        foreach ($_POST as $key=>$value){
           array_push($ids, Answer::make(['answer'=>$value,'field_id'=>$key,'exercise_id'=>$id])->create());
        }
        $inputData = $_REQUEST;
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        $new = true;
        return $view('answers.edit',compact('title','color', 'exercise', 'inputData', 'ids', 'new'));
    }

    public function update(View $view,$id): Response
    {
        $ids = [];
        foreach ($_POST as $key=>$value){
            array_push($ids, $key);
            $answer = Answer::find($key);
            $answer->answer = $value;
            $answer->save();
        }
        $inputData = $_REQUEST;
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.edit',compact('title','color', 'exercise', 'inputData', 'ids'));
    }

}

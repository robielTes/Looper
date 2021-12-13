<?php

namespace App\Http\Controllers;

use App\Support\View;
use phpDocumentor\Reflection\File;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Answer;
use App\Models\Field;
use App\Models\Fulfillment;

class AnswerController
{
    public function index(View $view,$id): Response
    {
        $answers = [];
        $fulfillment_ids = [];
        foreach (Answer::where('exercise_id',$id) as $answer){
            if(!in_array($answer->fulfillment_id,$fulfillment_ids)){
                array_push($answers,$answer);
                array_push($fulfillment_ids,$answer->fulfillment_id);
            }
        }
        $fulfillment= Fulfillment::all();
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'green';
        return $view('answers.index',compact('title','color', 'exercise', 'answers','fulfillment'));
    }

    public function show_result(View $view,$id,$rid): Response
    {
        $field = Field::find($rid);
        $answers = [];
        foreach (Answer::where('field_id',$rid) as $answer){
            if($answer->field_id == $rid){
                    array_push($answers,$answer);
                }
        }
        $title = Exercise::find($id)->title;
        $color = 'green';
        return $view('answers.show_results',compact('title','color', 'field', 'answers'));
    }

    public function show_fulfillment(View $view,$id,$rid): Response
    {
        $field = Field::find($rid);
        $answers = [];
        foreach (Answer::where('field_id',$rid) as $answer){
            if($answer->field_id == $rid){
                array_push($answers,$answer);
            }
        }
        $title = Exercise::find($id)->title;
        $color = 'green';
        return $view('answers.show_results',compact('title','color', 'field', 'answers'));
    }

    public function create(View $view,$id): Response
    {
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.create',compact('title','color', 'exercise'));
    }

    public function store(View $view,$id): Response
    {
        $fulfillments = Fulfillment::make(['take'=>date('Y-m-d H:i:s')])->create();
        $ids = [];
        foreach ($_POST as $key=>$value){
            array_push($ids, Answer::make(['answer'=>$value,'field_id'=>$key,'exercise_id'=>$id, 'fulfillment_id'=>$fulfillments])
                ->create());
        }
        $_SESSION['inputData'] = $_REQUEST;

        //TODO Create Redirect class
        header("Location: /exercises/$id/fulfillments/$fulfillments/edit");
        exit();

        return $view('answers.edit',compact( 'inputData'));
    }

    public function edit(View $view,$id): Response
    {

        $fulfillments = Fulfillment::make(['take'=>date('Y-m-d H:i:s')])->create();
        $ids = [];
        foreach ($_POST as $key=>$value){
           array_push($ids, Answer::make(['answer'=>$value,'field_id'=>$key,'exercise_id'=>$id, 'fulfillment_id'=>$fulfillments])
               ->create());
        }
        $inputData = $_REQUEST;
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.edit',compact('title','color', 'exercise', 'inputData', 'ids', 'fulfillments'));
    }

    public function update(View $view,$id ,$fid): Response
    {
        $ids = [];
        foreach ($_POST as $key=>$value){
            array_push($ids, $key);
            $answer = Answer::find($key);
            $answer->answer = $value;
            $answer->save();
        }
        $fulfillments =$fid;
        $inputData = $_REQUEST;
        $exercise = Exercise::find($id);
        $title = $exercise->title;
        $color = 'purple';
        return $view('answers.edit',compact('title','color', 'exercise', 'inputData', 'ids', 'fulfillments'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Answer;
use App\Models\Field;
use App\Models\Fulfillment;

class AnswerController extends Controller
{
    public function index(View $view, $id): Response
    {
        $answers = [];
        $fulfillment_ids = [];
        foreach (Answer::where('exercise_id', $id) as $answer) {
            if (!in_array($answer->fulfillment_id, $fulfillment_ids)) {
                array_push($answers, $answer);
                array_push($fulfillment_ids, $answer->fulfillment_id);
            }
        }
        $fulfillment = Fulfillment::all();
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'green');
        return $view('answers.index', compact('exercise', 'answers', 'fulfillment'));
    }

    public function showResult(View $view, $id, $rid): Response
    {
        $field = Field::find($rid);
        $answers = [];
        foreach (Answer::where('field_id', $rid) as $answer) {
            if ($answer->field_id == $rid) {
                array_push($answers, $answer);
            }
        }
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'green');
        return $view('answers.show_results', compact('exercise', 'field', 'answers'));
    }

    public function showFulfillment(View $view, $id, $fid): Response
    {
        $fulfillment = Fulfillment::find($fid)->take;
        $answers = Answer::where('fulfillment_id', $fid)[0];
        $this->displayStyle(Exercise::find($id)->title, 'green');
        return $view('answers.show_fulfillments', compact('answers', 'fulfillment'));
    }

    public function create(View $view, $id): Response
    {
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'purple');
        return $view('answers.create', compact('exercise'));
    }

    public function store(View $view, $id): Response
    {
        $fulfillment = Fulfillment::make(['take' => date('Y-m-d H:i:s')])->create();
        foreach ($_POST as $key => $value) {
            Answer::make([
                'answer' => $value,
                'field_id' => $key,
                'exercise_id' => $id,
                'fulfillment_id' => $fulfillment])
                ->create();
        }
        $_SESSION['inputData'] = $_REQUEST;

        return $this->redirect("/exercises/$id/fulfillments/$fulfillment/edit");
    }

    public function edit(View $view, $id, $fid): Response
    {
        $fulfillment = $fid;
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'purple');
        return $view('answers.edit', compact('exercise', 'fulfillment'));
    }

    public function update(View $view, $id, $fid): Response
    {
        foreach ($_POST as $key => $value) {
            $answer = Answer::answerField($key, $fid);
            $answer->answer = $value;
            $answer->save();
        }
        $_SESSION['inputData'] = $_REQUEST;
        $fulfillment = $fid;
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'purple');
        return $view('answers.edit', compact('exercise', 'fulfillment'));
    }
}

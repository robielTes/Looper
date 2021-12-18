<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Answer;
use App\Models\Field;
use App\Models\Fulfillment;
use ReflectionException;

class AnswerController extends Controller
{
    /**
     * @param View $view
     * @param $id
     * @return Response
     * @throws ReflectionException
     */
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

    /**
     * @param View $view
     * @param $id
     * @param $rid
     * @return Response
     * @throws ReflectionException
     */
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

    /**
     * @param View $view
     * @param $id
     * @param $fid
     * @return Response
     * @throws ReflectionException
     */
    public function showFulfillment(View $view, $id, $fid): Response
    {
        $fulfillment = Fulfillment::find($fid)->take;
        $answers = Answer::where('fulfillment_id', $fid)[0];
        $this->displayStyle(Exercise::find($id)->title, 'green');
        return $view('answers.show_fulfillments', compact('answers', 'fulfillment'));
    }

    /**
     * @param View $view
     * @param $id
     * @return Response
     * @throws ReflectionException
     */
    public function create(View $view, $id): Response
    {
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'purple');
        return $view('answers.create', compact('exercise'));
    }

    /**
     * @param View $view
     * @param $id
     * @return void
     */
    public function store(View $view, $id): void
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

        $this->redirect("/exercises/$id/fulfillments/$fulfillment/edit");
    }

    /**
     * @param View $view
     * @param $id
     * @param $fid
     * @return Response
     * @throws ReflectionException
     */
    public function edit(View $view, $id, $fid): Response
    {
        $fulfillment = $fid;
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'purple');
        return $view('answers.edit', compact('exercise', 'fulfillment'));
    }

    /**
     * @param View $view
     * @param $id
     * @param $fid
     * @return void
     */
    public function update(View $view, $id, $fid): void
    {
        foreach ($_POST as $key => $value) {
            $answer = Answer::answerField($key, $fid);
            $answer->answer = $value;
            $answer->save();
        }
        $_SESSION['inputData'] = $_REQUEST;
        $this->redirect("/exercises/$id/fulfillments/$fid/edit");
    }
}

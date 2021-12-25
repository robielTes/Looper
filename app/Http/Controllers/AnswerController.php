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
     * show all answer for selected exercise
     * @param View $view
     * @param int $id
     * @return Response
     * @throws ReflectionException
     */
    public function index(View $view, int $id): Response
    {

        $answers = [];
        $fulfillment_ids = [];
        foreach (Answer::where('exercise_id', $id) as $answer) {
            if (!in_array($answer->fulfillment_id, $fulfillment_ids)) {
                $answers[] = $answer;
                $fulfillment_ids[] = $answer->fulfillment_id;
            }
        }
        $fulfillment = Fulfillment::all();
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'green');
        return $view('answers.index', compact('exercise', 'answers', 'fulfillment'));
    }

    /**
     * show all answer for selected field
     * @param View $view
     * @param int $id
     * @param int $rid
     * @return Response
     * @throws ReflectionException
     */
    public function showResult(View $view, int $id, int $rid): Response
    {
        $field = Field::find($rid);
        $answers = [];
        foreach (Answer::where('field_id', $rid) as $answer) {
            if ($answer->field_id == $rid) {
                $answers[] = $answer;
            }
        }
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'green');
        return $view('answers.show_results', compact('exercise', 'field', 'answers'));
    }

    /**
     * show all answer for selected fulfilment "Time"
     * @param View $view
     * @param int $id
     * @param int $fid
     * @return Response
     * @throws ReflectionException
     */
    public function showFulfillment(View $view, int $id, int $fid): Response
    {
        $fulfillment = Fulfillment::find($fid)->take;
        $answers = Answer::where('fulfillment_id', $fid)[0];
        $this->displayStyle(Exercise::find($id)->title, 'green');
        return $view('answers.show_fulfillments', compact('answers', 'fulfillment'));
    }

    /**
     * send you to create answer form after verified if the exercise is answerable
     * @param View $view
     * @param int $id
     * @return Response
     * @throws ReflectionException
     */
    public function create(View $view, int $id): Response
    {
        if (Exercise::isAnswerable($id)) {
            $exercise = Exercise::find($id);
            $this->displayStyle($exercise->title, 'purple');
            return $view('answers.create', compact('exercise'));
        }
        return $view('404');
    }

    /**
     * call store answer with given input after verified if the exercise is answerable
     * @param View $view
     * @param int $id
     * @return Response
     */
    public function store(View $view, int $id): Response
    {
        if (Exercise::isAnswerable($id)) {
            $fulfillment = Answer::store($id, $_REQUEST);
            $this->redirect("/exercises/$id/fulfillments/$fulfillment/edit");
        }
        return $view('404');
    }

    /**
     * send you to edit answer form with the input data after verified if the exercise is answerable
     * @param View $view
     * @param int $id
     * @param int $fid
     * @return Response
     * @throws ReflectionException
     */
    public function edit(View $view, int $id, int $fid): Response
    {
        if (Exercise::isAnswerable($id)) {
            $fulfillment = $fid;
            $exercise = Exercise::find($id);
            $this->displayStyle($exercise->title, 'purple');
            return $view('answers.edit', compact('exercise', 'fulfillment'));
        }
        return $view('404');
    }

    /**
     * call update answer with given input after verified if the exercise is answerable
     * @param View $view
     * @param int $id
     * @param int $fid
     * @return Response
     */
    public function update(View $view, int $id, int $fid): Response
    {
        if (Exercise::isAnswerable($id)) {
            Answer::update($fid, $_REQUEST);
            $this->redirect("/exercises/$id/fulfillments/$fid/edit");
        }
        return $view('404');
    }
}

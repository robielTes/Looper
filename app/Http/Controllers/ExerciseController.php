<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Line;

class ExerciseController extends Controller
{

    /**
     * @param View $view
     * @return Response
     */
    public function index(View $view): Response
    {
        $exercisesAnswering = Exercise::answering();
        $this->displayStyle('', 'purple');
        return $view('exercises.take', compact('exercisesAnswering'));
    }

    /**
     * @param View $view
     * @param $id
     * @return Response
     * @throws \ReflectionException
     */
    public function show(View $view, $id): Response
    {
        $lines = Line::all();
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'yellow');
        return $view('fields.create', compact('exercise', 'lines'));
    }

    /**
     * @param View $view
     * @return Response
     */
    public function create(View $view): Response
    {
        $last = array_key_last(Exercise::all()) + 2; //return last exercise id
        $this->displayStyle('New exercise', 'yellow');
        return $view('exercises.create', compact('last'));
    }

    /**
     * @param View $view
     * @return void
     */
    public function store(View $view,): void
    {
        $exerciseId = Exercise::make(['title' => $_REQUEST['title'], 'states_id' => 1])->create();
        $this->redirect("/exercises/$exerciseId/fields");
    }

    /**
     * @param View $view
     * @return Response
     */
    public function edit(View $view): Response
    {
        $exercisesBuilding = Exercise::building();
        $exercisesAnswering = Exercise::answering();
        $exercisesClosed = Exercise::closed();
        $this->displayStyle('', 'green');
        return $view('exercises.manage', compact('exercisesBuilding', 'exercisesAnswering', 'exercisesClosed'));
    }

    /**
     * @param View $view
     * @param $id
     * @return void
     * @throws \ReflectionException
     */
    public function update(View $view, $id): void
    {
        if(empty(Exercise::find($id)->fields())){
            $this->redirect("/exercises/$id/fields");//if the fields is empty
        }else{
            Exercise::changeState($id);
            $this->redirect('/exercises');
        }
    }

    /**
     * @param View $view
     * @param $id
     * @return void
     * @throws \ReflectionException
     */
    public function destroy(View $view, $id): void
    {
        Exercise::find($id)->delete();
        $this->redirect('/exercises');
    }
}

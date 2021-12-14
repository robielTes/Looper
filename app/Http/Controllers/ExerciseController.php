<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Line;

class ExerciseController extends Controller
{
    public function take(View $view): Response
    {
        $this->displayStyle('','purple');
        $exercises = Exercise::all();
        return $view('exercises.take', compact(  'exercises'));
    }

    public function create(View $view): Response
    {
        $this->displayStyle('New exercise','yellow');
        $last = array_key_last(Exercise::all()) + 2;
        return $view('exercises.create', compact(  'last'));
    }

    public function manage(View $view): Response
    {
        $this->displayStyle('','green');
        $exercises = Exercise::all();
        return $view('exercises.manage', compact(  'exercises'));
    }

    public function store(View $view, $id): Response
    {
        $this->displayStyle($_REQUEST['title'],'yellow');
        $lines = Line::all();
        $exerciseId = Exercise::make(['title' => $_REQUEST['title'], 'states_id' => 1])->create();
        $exercise = Exercise::find($exerciseId);
        return $view('fields.create', compact( 'lines', 'exercise'));
    }

    public function show(View $view, $id): Response
    {
        $lines = Line::all();
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title,'yellow');
        return $view('fields.create', compact('exercise',  'lines'));
    }

    public function update(View $view, $id): Response
    {
        $exercise = Exercise::find($id);
        if ($exercise->state_id === 1) {
            $exercise->state_id = 2;
        } elseif ($exercise->state_id === 2) {
            $exercise->state_id = 3;
        }
        $exercise->save();
        header('Location: /exercises');
        exit();
    }

    public function destroy(View $view, $id): Response
    {
        $exercise = Exercise::find($id);
        $exercise->delete();

        header('Location: /exercises');
        exit();
    }
}

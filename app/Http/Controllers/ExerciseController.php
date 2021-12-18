<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Line;

class ExerciseController extends Controller
{

    public function index(View $view): Response
    {
        $exercises = Exercise::all();
        $this->displayStyle('', 'purple');
        return $view('exercises.take', compact('exercises'));
    }

    public function show(View $view, $id): Response
    {
        $lines = Line::all();
        $exercise = Exercise::find($id);
        $this->displayStyle($exercise->title, 'yellow');
        return $view('fields.create', compact('exercise', 'lines'));
    }

    public function create(View $view): Response
    {
        $last = array_key_last(Exercise::all()) + 2;
        $this->displayStyle('New exercise', 'yellow');
        return $view('exercises.create', compact('last'));
    }

    public function store(View $view, $id): void
    {
        Exercise::make(['title' => $_REQUEST['title'], 'states_id' => 1])->create();
        $this->redirect("/exercises/$id/fields");
    }

    public function edit(View $view): Response
    {
        $exercises = Exercise::all();
        $this->displayStyle('', 'green');
        return $view('exercises.manage', compact('exercises'));
    }

    public function update(View $view, $id): void
    {
        $exercise = Exercise::find($id);
        if ($exercise->state_id === 1) {
            $exercise->state_id = 2;
        } elseif ($exercise->state_id === 2) {
            $exercise->state_id = 3;
        }
        $exercise->save();
        $this->redirect('/exercises');
    }

    public function destroy(View $view, $id): void
    {
        Exercise::find($id)->delete();
        $this->redirect('/exercises');
    }
}

<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Line;
use ReflectionException;

class ExerciseController extends Controller
{

    /**
     * @param View $view
     * @return Response
     */
    public function index(View $view): Response
    {
        $exercisesAnswering = Exercise::byState('ANS');
        $this->displayStyle('', 'purple');
        return $view('exercises.take', compact('exercisesAnswering'));
    }

    /**
     * show selected exercise page if it is editable else 404 page
     * @param View $view
     * @param int $id exercise id
     * @return Response
     * @throws ReflectionException
     */
    public function show(View $view, int $id): Response
    {
        if (Exercise::isEditable($id)) {
            $lines = Line::all();
            $exercise = Exercise::find($id);
            $this->displayStyle($exercise->title, 'yellow');
            return $view('fields.create', compact('exercise', 'lines'));
        }
        return $view('404');
    }

    /**
     * prepare create exercise page
     * @param View $view
     * @return Response
     */
    public function create(View $view): Response
    {
        $next = Exercise::nextExercise()->id; //return after next exercise id
        $this->displayStyle('New exercise', 'yellow');
        return $view('exercises.create', compact('next'));
    }

    /**
     * call add to create new exercise by passing the given request form
     * @param View $view
     * create new Exercise with Building state
     */
    public function store(View $view): void
    {
        $exerciseId = Exercise::add($_REQUEST);
        $this->redirect("/exercises/$exerciseId/fields");
    }

    /**
     * return to exercise manage page with all exercise group by their status
     * @param View $view
     * @return Response
     */
    public function edit(View $view): Response
    {
        $exercisesBuilding = Exercise::byState('BLD');
        $exercisesAnswering = Exercise::byState('ANS');
        $exercisesClosed = Exercise::byState('CLD');
        $this->displayStyle('', 'green');
        return $view('exercises.manage', compact('exercisesBuilding', 'exercisesAnswering', 'exercisesClosed'));
    }

    /**
     * update exercise state if it is building or answering
     * @param View $view
     * @param int $id exercise id
     * @param string $status if desire status is given default none
     * @throws ReflectionException
     */
    public function update(View $view, int $id, string $status = ''): void
    {
        //if the exercise has no fields do nothing
        if (empty(Exercise::find($id)->fields())) {
            $this->redirect("/exercises/$id/fields"); // redirect to same page
        } else {
            Exercise::updateState($id, $status);
            $this->redirect('/exercises');
        }
    }

    /**
     * destroy selected exercise with status building or closed
     * @param View $view
     * @param int $id exercise id
     * @throws ReflectionException
     */
    public function destroy(View $view, int $id): void
    {
        Exercise::remove($id);
        $this->redirect('/exercises');
    }
}

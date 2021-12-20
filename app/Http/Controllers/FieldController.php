<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Field;
use App\Models\Line;
use ReflectionException;

class FieldController extends Controller
{

    /**
     * @param View $view
     * @param int $id exercise id
     */
    public function store(View $view, int $id): void
    {
        Field::store($id, $_REQUEST);

        $this->redirect("/exercises/$id/fields");
    }

    /**
     * @param View $view
     * @param int $id exercise id
     * @param int $fid field id
     * @return Response
     * @throws ReflectionException
     */
    public function edit(View $view, int $id, int $fid): Response
    {
        $exercise = Exercise::find($id);
        $field = Field::find($fid);
        $lines = Line::all();
        $this->displayStyle($exercise->title, 'yellow');

        return $view('fields.edit', compact('lines', 'field', 'exercise'));
    }

    /**
     * @param View $view
     * @param int $fid field id
     * @throws ReflectionException
     */
    public function update(View $view, int $fid): void
    {
        Field::update($fid, $_REQUEST);

        $this->redirect("/exercises");
    }

    /**
     * @param View $view
     * @param int $id exercise id
     * @param int $fid field id
     * @throws ReflectionException
     */
    public function destroy(View $view, int $id, int $fid): void
    {
        $field = Field::find($fid);
        $field->delete();

        $this->redirect("/exercises/$id/fields");
    }
}

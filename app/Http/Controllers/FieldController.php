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
     * show field edit form if the given field belong to the given exercise else page 404
     * @param View $view
     * @param int $id exercise id
     * @param int $fid field id
     * @return Response
     * @throws ReflectionException
     */
    public function edit(View $view, int $id, int $fid): Response
    {
        if (Field::isBelong($id, $fid)) {
            $field = Field::find($fid);
            $exercise = Exercise::find($id);
            $lines = Line::all();
            $this->displayStyle($exercise->title, 'yellow');
            return $view('fields.edit', compact('lines', 'field', 'exercise'));
        }
        return $view('404');
    }

    /**
     * call update method with the new data
     * @param View $view
     * @param int $fid field id
     * @param int $id exercise id
     * @throws ReflectionException
     */
    public function update(View $view, int $fid, int $id): void
    {
        Field::update($fid, $_REQUEST);

        $this->redirect("/exercises/$id/fields");
    }

    /**
     * delete field if the exercise has building status else page 404
     * @param View $view
     * @param int $id exercise id
     * @param int $fid field id
     * @return Response
     * @throws ReflectionException
     */
    public function destroy(View $view, int $id, int $fid): Response
    {
        if (Exercise::isEditable($id)) {
            $field = Field::find($fid);
            $field->delete();

            $this->redirect("/exercises/$id/fields");
        }
        return $view('404');
    }
}

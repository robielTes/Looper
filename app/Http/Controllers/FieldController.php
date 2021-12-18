<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Field;
use App\Models\Line;

class FieldController extends Controller
{

    public function create(View $view, $id): Response
    {

        $lines = Line::where('kind', str_replace("_", " ", $_REQUEST['value-kind']));
        Field::make(['label' => $_REQUEST['label'], 'line_id' => $lines[0]->id, 'exercise_id' => $id])->create();

        return $this->redirect("/exercises/$id/fields");
    }

    public function edit(View $view, $id, $fid): Response
    {
        $exercise = Exercise::find($id);
        $field = Field::find($fid);
        $lines = Line::all();
        $this->displayStyle($exercise->title, 'yellow');
        return $view('fields.edit', compact('lines', 'field', 'exercise'));
    }

    public function update(View $view, $id, $fid): Response
    {
        $field = Field::find($fid);
        $slug = strtolower(explode("-", $_REQUEST['value-kind'])[0]);
        $lineId = Line::where('slug', $slug)[0]->id;
        $field->label = $_REQUEST['label'];
        $field->line_id = $lineId;
        $field->save();

        return $this->redirect("/exercises");
    }

    public function destroy(View $view, $id, $fid)
    {
        $field = Field::find($fid);
        $field->delete();

        return $this->redirect("/exercises/$id/fields");
    }
}

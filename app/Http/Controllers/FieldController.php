<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Field;
use App\Models\Line;

class FieldController extends Controller
{

    public function store(View $view, $id): void
    {

        $lines = Line::where('kind', str_replace("_", " ", $_REQUEST['value-kind']));
        Field::make(['label' => $_REQUEST['label'], 'line_id' => $lines[0]->id, 'exercise_id' => $id])->create();

        $this->redirect("/exercises/$id/fields");
    }

    public function edit(View $view, $id, $fid): Response
    {
        $exercise = Exercise::find($id);
        $field = Field::find($fid);
        $lines = Line::all();
        $this->displayStyle($exercise->title, 'yellow');
        return $view('fields.edit', compact('lines', 'field', 'exercise'));
    }

    public function update(View $view, $id, $fid): void
    {
        $field = Field::find($fid);
        $slug = strtolower(explode("-", $_REQUEST['value-kind'])[0]);
        $lineId = Line::where('slug', $slug)[0]->id;
        $field->label = $_REQUEST['label'];
        $field->line_id = $lineId;
        $field->save();

        $this->redirect("/exercises");
    }

    public function destroy(View $view, $id, $fid): void
    {
        $field = Field::find($fid);
        $field->delete();

        $this->redirect("/exercises/$id/fields");
    }
}

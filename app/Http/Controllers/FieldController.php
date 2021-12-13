<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;
use App\Models\Field;
use App\Models\Line;

class FieldController
{

    public function create(View $view, $id): Response
    {

        $lines = Line::where('kind',str_replace("_"," ",$_REQUEST['value-kind']));
        Field::make(['label' => $_REQUEST['label'], 'line_id' => $lines[0]->id, 'exercise_id' => $id])->create();

        //TODO Create Redirect class
        header('Location: /exercises/'.$id.'/fields');
        exit();
        return $view('fields.create');
    }

    public function destroy(View $view, $id, $fid): Response
    {
        $field = Field::find($fid);
        $field->delete();

        //TODO Create Redirect class
        header("Location: /exercises/{$id}/fields");
        exit();
        return $view('exercises.manage');
    }

    public function edit(View $view, $id, $fid): Response
    {
        $exercise = Exercise::find($id);
        $field = Field::find($fid);
        $lines = Line::all();
        $title = $_REQUEST['title'];
        $color = 'yellow';
        return $view('fields.edit', compact('title', 'color', 'lines','field','exercise'));
    }

    public function update(View $view, $id, $fid): Response
    {
        $field = Field::find($fid);
        $slug = strtolower(explode("-", $_REQUEST['value-kind'])[0]);
        $lineId = Line::where('slug',$slug)[0]->id;
        $field->label = $_REQUEST['label'];
        $field->line_id = $lineId;
        $field->save();

        //TODO Create Redirect class
        header('Location: /exercises');
        exit();
        return $view('exercises.manage');
    }
}

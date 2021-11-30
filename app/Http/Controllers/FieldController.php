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
        $lines = Line::where('kind',str_replace("-"," ",$_REQUEST['value-kind']));
        Field::make(['label' => $_REQUEST['label'], 'line_id' => $lines[0]->id, 'exercise_id' => $id])->create();

        //TODO Create Redirect class
        header('Location: /exercises/'.$id.'/fields');
        exit();
        return $view('fields.create');
    }
}

<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;

class FieldController
{

    public function show(View $view, $id): Response
    {

        $title = 'New exercise';
        $color = 'yellow';
        return $view('fields.show',compact('title','color'));
    }
}

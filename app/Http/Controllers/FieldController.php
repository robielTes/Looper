<?php

namespace App\Http\Controllers;

use App\Support\View;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Exercise;

class FieldController
{
    public function create(View $view): Response
    {
        $title = 'New exercise';
        $color = 'yellow';
        return $view('fields.create',compact('title','color'));
    }
}

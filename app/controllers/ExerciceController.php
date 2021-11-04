<?php

require_once 'app/models/Exercise.php';

class ExerciceController
{
    public function index()
    {
        $exercise = new Exercise();
        $exercise->title = "test";
        $exercise->states_id = "2";
        $exercise->create();
        require_once('views/pages/add_field.php');
    }
}
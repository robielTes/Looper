<?php
require_once 'models/Exercise.php';

class ExerciceController
{
    public function index()
    {
        $members = Exercise::index();
        require_once('views/.php');
    }
}
<?php

class HomeController
{
    public function index()
    {
        require_once ('views/main.php');
    }
    public function take()
    {
        require_once ('views/pages/take_exercise.php');
    }
    public function manage()
    {
        require_once ('views/pages/manage_exercise.php');
    }
    public function create()
    {
        require_once ('views/pages/create_exercise.php');
    }
}
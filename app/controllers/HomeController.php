<?php

class HomeController
{

    public function index()
    {
        require_once('./public/views/main.php');
    }

    public function take()
    {
        $args = [
            "title" => '',
            "color" => 'purple',
        ];
        return $this->render('take_exercise', $args);
    }

    public function create()
    {
        $args = [
            "title" => 'New Exercise',
            "color" => 'yellow',
        ];
        return $this->render('create_exercise', $args);
    }

    public function manage()
    {
        $args = [
            "title" => 'Manage Exercise',
            "color" => 'green',
        ];
        return $this->render('manage_exercise', $args);
    }
}
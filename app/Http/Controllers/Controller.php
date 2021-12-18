<?php

namespace App\Http\Controllers;

class Controller
{
    public function displayStyle(string $title, string $color)
    {
        $_SESSION['title'] = $title;
        $_SESSION['color'] = $color;
    }

    public function redirect(string $to)
    {
        header("Location: $to");
        exit();
    }

}
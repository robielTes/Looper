<?php

namespace App\Http\Controllers;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    /**
     * @param string $title
     * @param string $color
     * @return void
     */
    public function displayStyle(string $title, string $color)
    {
        $_SESSION['title'] = $title;
        $_SESSION['color'] = $color;
    }

    /**
     * @param string $to
     * @return void
     */
    public function redirect(string $to)
    {
        header("Location: $to");
        exit();
    }

}
<?php

namespace App\Http\Controllers;

class Controller
{

    /**
     * @param string $title
     * @param string $color
     * store title and color in session variable
     */

    public function displayStyle(string $title, string $color)
    {
        $_SESSION['title'] = $title;
        $_SESSION['color'] = $color;
    }


    /**
     * @param string $to
     * redirect to given url
     */
    public function redirect(string $to)
    {
        header("Location: $to");
        exit();
    }
}

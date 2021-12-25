<?php

namespace App\Http\Controllers;

class Controller
{

    /**
     * store title and color in session variable
     * @param string $title page
     * @param string $color header
     */

    public function displayStyle(string $title, string $color)
    {
        $_SESSION['title'] = $title;
        $_SESSION['color'] = $color;
    }


    /**
     * redirect to given url
     * @param string $to
     */
    public function redirect(string $to)
    {
        header("Location: $to");
        exit();
    }
}

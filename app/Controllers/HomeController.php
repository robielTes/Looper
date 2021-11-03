<?php

namespace App\Controllers;

class HomeController
{

    public function home()
    {
      require_once 'views/main.php';
    }
    public function take()
    {
        echo 'take';
    }

    public function create()
    {
        echo 'create';
    }
    public function manage()
    {
        echo 'manage';
    }
}

/*
 public function take()
    {
        $args = [
            "title" => '',
            "color" => 'purple',
        ];
        return $this->render('take_exercise',$args);
    }

 * public function home(Request $request)
{
    $body = $request->getBody();
    return 'Home controller';
}
*/

<?php

namespace App\Controllers;

use App\Application;
use App\Controller;
use App\Request;

class HomeController extends Controller
{

    public function home(Request $request)
    {
        $args = [
            "title" => 'Exercice Looper',
            "color" => 'purple',
        ];
        return $this->render('main',$args);
    }
    public function take()
    {
        $args = [
            "title" => '',
            "color" => 'purple',
        ];
        return $this->render('take_exercise',$args);
    }

    public function create()
    {
        $args = [
            "title" => 'New Exercise',
            "color" => 'yellow',
        ];
        return $this->render('create_exercise',$args);
    }
    public function manage()
    {
        $args = [
            "title" => 'Manage Exercise',
            "color" => 'green',
        ];
        return $this->render('manage_exercise',$args);
    }
}

/*public function home(Request $request)
{
    $body = $request->getBody();
    return 'Home controller';
}
*/

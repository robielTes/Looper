<?php
session_start();
set_include_path(".");
require '.env.php';
require 'vendor/autoload.php';

require_once ('controllers/HomeController.php');
require_once ('controllers/ExerciceController.php');

$HomeController = new HomeController();
$ExerciceController = new ExerciceController();

function main()
{
    $controller = "HomeController";
    $method = "index";

    if (isset($_GET["controller"])) {
        $controller = $_GET["controller"];
    }

    if (isset($_GET["method"])) {
        $method = $_GET["method"];
    }

    $c = new $controller();
    $c->$method();
}

main();
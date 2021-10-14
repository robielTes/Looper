<?php
session_start();
set_include_path(".");

require 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->get('/', function() {

        require_once "views/main.php";
    });

    $r->get('/create', function() {
        require_once "views/pages/create_exercise.php";
    });

    $r->get('/take', function() {
        require_once "views/pages/take_exercise.php";
    });

    $r->get('/manage', function() {
        require_once "views/pages/manage_exercise.php";
    });

    $r->get('/books/{id}', function ($args) {
        // Show book identified by $args['id']
        echo "Book #" . $args['id'];
    });

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', function ($args) {
        echo "User #" . $args['id'];
    });
    // The /{title} suffix is optional2
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', function ($args) {
        echo "User #" . $args['id'];
        echo "<br>Title: " . $args['title'];
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

function getUsers()
{
    echo "getUsers function action goes here...";
}

function testFunction()
{
    echo "testFunction action goes here...";
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        require_once "views/pages/404.php";
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        require_once "views/pages/404.php";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        print $handler($vars);
        break;
}
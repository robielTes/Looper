<?php

namespace App\Support;

use Illuminate\Support\Str;
use Slim\App;

class Route
{
    public static App $app;

    /**
     * @param App $app reference to our application
     * @return App
     */
    public static function setup(App &$app)
    {
        self::$app = $app;
        return $app;
    }

    /**
     * $app->get("/","HomeController@index")
     * $app->$verb("route","action")
     * @param $verb
     * @param $parameters
     * @return mixed
     */
    public static function __callStatic($verb, $parameters)
    {
        $app = self::$app;

        [$route, $action] = $parameters; //deconstruct the $parameters

        self::validation($route, $verb, $action);//verifies if it is callable or string *@*

        return is_callable($action)
            ? $app->$verb($route, $action) //if callable call it
            : $app->$verb($route, self::resolveViaController($action));//if not resolve it
    }

    /**
     * if the route is not callable format the class name and method name to be usable
     * @param $action
     * @return array
     */
    public static function resolveViaController($action): array
    {
        $class = Str::before($action, '@');
        $method = Str::after($action, '@');

        //homeController => '\\App\\Http\\Controllers\\homeController
        $controller = config('routing.controllers.namespace') . $class;

        return [$controller, $method];
    }

    /**
     * verifies if the given route is valid else throw exception
     * if the action is callable, string like nameClass@nameMethod
     * @param $route
     * @param $verb
     * @param $action
     * @return void
     */
    protected static function validation($route, $verb, $action)
    {
        $exception = "Unresolvable Route Callback/Controller action";
        $context = json_encode(compact('route', 'action', 'verb'));
        $fails = !((is_callable($action)) or (is_string($action) and Str::is("*@*", $action)));

        throw_when($fails, $exception . $context);
    }
}

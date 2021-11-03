<?php

namespace App;

class Controller
{
    public string $layout = 'layout';
    public string $action = '';

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $args = []): string
    {
        return Application::$app->view->renderView($view, $args);

    }

}
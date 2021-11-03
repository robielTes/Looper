<?php

namespace App;

class View
{
    public string $title = '';

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function renderView($view, array $args)
    {
        $layoutName = Application::$app->layout;
        if (Application::$app->controller) {
            $layoutName = Application::$app->controller->layout;
        }
        $viewContent = $this->renderViewOnly($view, $args);
        ob_start();
        include_once Application::$ROOT_DIR."/view/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $args)
    {
        foreach ($args as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/view/$view.php";
        return ob_get_clean();
    }
}
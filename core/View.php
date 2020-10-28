<?php

namespace App\core;


class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderViewOnly($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($content)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $content, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "\\views\layouts\\$layout.php";
        return ob_get_clean();
    }

    protected function renderViewOnly($view, $params = [])
    {
        foreach ($params as $key => $val) {
            $$key = $val;
        }
        // by doing so, the new variables are avaible in the view page
        ob_start();
        include_once Application::$ROOT_DIR . "\\views\\$view.php";
        return ob_get_clean();
    }
}

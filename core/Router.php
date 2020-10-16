<?php

namespace App\core;

class Router
{
    protected array $routes = [];
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return 'Not found';
            exit;
        }

        if (is_string($callback)) {
            echo $this->renderView($callback);
            return;
        }

        return call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderViewOnly($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "\\views\layouts\main.php";
        return ob_get_clean();
    }

    protected function renderViewOnly($view, $params = [])
    {
        ob_start();
        include_once Application::$ROOT_DIR . "\\views\\$view.php";
        return ob_get_clean();
    }
}

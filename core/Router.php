<?php

namespace App\core;

class Router
{

    protected array $routes = [];

    public function get($path, $callback)
    {
        $routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        echo "resolving";
    }
}

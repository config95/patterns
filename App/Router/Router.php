<?php

namespace App;

class Router
{
    private $routes = [];
    public function get($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch() {
        echo $this->routes[$_SERVER['REQUEST_URI']]();
    }
}
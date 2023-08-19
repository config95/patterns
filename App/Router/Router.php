<?php

namespace App;

class Router
{
    private $routes = [];
    public function get($route, $callback) {
        $parts = explode('@', $callback);
        $function = $parts[0] . '::' . $parts[1];
        $this->routes[$route] = $function;
    }

    public function dispatch() {
        echo $this->routes[$_SERVER['REQUEST_URI']]();
    }
}
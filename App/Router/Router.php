<?php

namespace App;

use App\Exceptions\HttpException;

class Router
{
    private $routes = [];
    public function get($route, $callback) {
        $parts = explode('@', $callback);
        $function = $parts[0] . '::' . $parts[1];
        $this->routes[$route] = $function;
    }

    public function dispatch() {
        if (empty($this->routes[$_SERVER['REQUEST_URI']]))
        {
            throw new HttpException('Страница не соответствует', 500);
        }

        return $this->routes[$_SERVER['REQUEST_URI']]();
    }
}
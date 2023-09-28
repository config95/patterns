<?php

namespace App\Router;

use App\Exceptions\HttpException\HttpException;
use App\Route\Route;

class Router
{
    private array $routes = [];
    public function get($route, $callback): void
    {
        $this->routes[] = new Route($callback, 'GET', $route);
    }

    public function post($route, $callback): void
    {
        $this->routes[] = new Route($callback, 'POST', $route);
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
            if ($route->match($method, $this->normalizeURL())) {
                return $route->run($this->normalizeURL());
            }
        }

        return throw new HttpException('Страница не соответствует', 500);
    }

    protected function normalizeURL() {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri != '/') {
            $uri = explode('?', $uri);
            $uri = $uri[0];
            $uri = rtrim($uri, '/');
        }

        return $uri;
    }
}
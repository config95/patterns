<?php

namespace App\Route;

class Route {
    private $method;
    private $path;
    private $callback;

    public function __construct($callback, $method, $path)
    {
        $this->path = $path;
        $this->callback = $callback;
        $this->method = $method;
    }

    private function prepareCallback($callback) {
        $parts = explode('@', $callback);

        return $parts[0] . '::' . $parts[1];
    }

    public function getUri() {
        return $this->path;
    }

    public function match($method, $uri): bool {
        return $this->method == $method
            && preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getUri()) . '$/', $uri);
    }

    public function run($uri) {
        $function = $this->prepareCallback($this->callback);
        $args = [];
        $match = preg_match('/^' . str_replace(['*', '/'], ['(\w+)', '\/'], $this->getUri()) . '$/', $uri, $args);

        if ($match) {
            unset($args[0]);
        }

        return call_user_func_array($function, $args);
    }
}
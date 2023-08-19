<?php

namespace App;

class Application
{
    private Router $router;
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run() {
        $this->router->dispatch();
    }
}
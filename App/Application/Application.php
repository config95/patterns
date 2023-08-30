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
        try {
            $data = $this->router->dispatch();
        } catch (\Exception $e) {
            try {
                $this->renderException($e);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            return;
        }

        if ($data instanceof Renderable) {
            $data->render();
        } else {
            echo $data;
        }
    }

    protected function renderException(\Exception $e)
    {
        if ($e instanceof Renderable)
        {
            throw new \Exception($e->render(), 500);
        }
        else
        {
            throw new \Exception($e->getMessage(), 500);
        }
    }
}
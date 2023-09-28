<?php

namespace App\Application;

use App\Config;
use App\Renderable\Renderable;
use App\Router\Router;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    private Router $router;
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    protected function initialize() {
        $capsule = new Capsule;
        $config = Config::getInstance();

        $db = $config->get('db');

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $db['host'],
            'database' => $db['database'],
            'username' => $db['user'],
            'password' => $db['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
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
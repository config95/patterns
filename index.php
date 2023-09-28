<?php

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$router = new App\Router\Router();

$router->get('/',      \App\Controller\Controller::class . '@index');
$router->get('/about', \App\Controller\Controller::class . '@about');
$router->get('/post/*', \App\Controller\Controller::class . '@test');

$application = new \App\Application\Application($router);


$application->run();
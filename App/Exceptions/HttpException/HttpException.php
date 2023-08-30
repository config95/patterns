<?php

namespace App\Exceptions;

use App\Renderable;

class HttpException extends \Exception implements Renderable
{
    public function render()
    {
        echo 'Страница не соответствует условию, вызвано через метод рендера';
    }
}
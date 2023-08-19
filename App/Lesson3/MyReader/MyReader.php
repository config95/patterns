<?php

namespace App\Lesson3;

class MyReader implements Reader
{
    private $data = '';

    public function __construct($data = '')
    {
        $this->data = $data;
    }

    public function read(): array
    {
        return explode('. ', $this->data);
    }
}
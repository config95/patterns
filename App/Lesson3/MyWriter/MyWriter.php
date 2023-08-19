<?php

namespace App\Lesson3;

class MyWriter implements Writer
{
    public function write(array $data)
    {
        $_SESSION['data'] = implode(' ', $data);
    }
}
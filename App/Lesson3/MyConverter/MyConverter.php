<?php

namespace App\Lesson3;
class MyConverter implements \App\Lesson3\Converter
{
    public function convert($item)
    {
        return $item . '<br>';
    }
}
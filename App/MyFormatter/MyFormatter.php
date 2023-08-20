<?php

namespace App;

class MyFormatter implements Formatter
{
    public function format(string $string)
    {
        return $string . ' Вызвался мой класс форматтера. Переношу строку. <br>';
    }
}
<?php

namespace App;

class MyRender implements Renderable
{
    public function render(string $string)
    {
        echo $string . ' Мой метод рендера сработал, переношу строку. <br>';
    }
}
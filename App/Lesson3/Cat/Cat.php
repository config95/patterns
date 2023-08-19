<?php

namespace App\Lesson3\CatFactory;

class Cat {
    private $name;
    private $color;
    private $age;

    public function __construct($name, $color, $age) {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
}
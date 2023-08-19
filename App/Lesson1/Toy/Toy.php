<?php
namespace App\Lesson1;

class Toy {
    public $name;
    public $cost;

    public function __construct($name)
    {
        $this->name = $name;
        $this->cost = rand(100, 1000);
    }
}
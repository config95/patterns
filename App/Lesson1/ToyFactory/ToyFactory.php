<?php
namespace App\Lesson1;
class ToyFactory {
    public function createToy($name) {
        return new Toy($name);
    }
}
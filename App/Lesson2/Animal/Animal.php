<?php


namespace App\Lesson2;

abstract class Animal
{
    abstract function say();
    abstract function walk();

    public function is_bird() {
        return false;
    }
}
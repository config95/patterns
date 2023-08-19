<?php

namespace App\Lesson2;

class Farm {
    public $animals = [];

    public function addAnimal(Animal $animal) {
        $animal->walk();
        $this->animals[] = $animal;
    }

    public function rollCall() {
        foreach ($this->animals as $animal) {
            $animal->say();
        }
    }
}
<?php

namespace App\Lesson2;

class Farmer {
    public function addAnimal(Farm $farm, Animal $animal) {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm) {
        $farm->rollCall();
    }
}
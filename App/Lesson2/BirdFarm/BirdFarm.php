<?php

namespace App\Lesson2;

class BirdFarm extends Farm {
    public function addAnimal(Animal $animal) {
        if (!$animal->is_bird())
            return;

        echo "На ферме {$this->showAnimalsCount()} птиц";

        $animal->walk();
        $this->animals[] = $animal;
    }

    private function showAnimalsCount() {
        return count($this->animals);
    }
}
<?php

namespace App\Lesson2;

abstract class Bird extends Animal {
    public function tryToFly() {
        echo "Вжих-вжих-топ-топ<br>";
    }

    public function is_bird() {
        return true;
    }
}
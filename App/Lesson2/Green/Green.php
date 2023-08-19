<?php

namespace App\Lesson2;

class Green {
    public function burn() {
        return new BlueFlame();
    }

    public function __toString() {
        return 'Трава';
    }
}
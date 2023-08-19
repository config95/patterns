<?php

namespace App\Lesson2;

class Money {
    public function burn() {
        return new BlueFlame();
    }

    public function __toString() {
        return 'Деньги';
    }
}
<?php

namespace App\Lesson2;

class Chicken extends Bird {
    public function say() {
        echo 'Кукареку' . '<br>';
    }

    public function walk() {
        echo 'TOP TOP<br>' ;
    }
}
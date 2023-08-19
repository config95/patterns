<?php

namespace App\Lesson2;

class Tree {
    public function burn() {
        return new RedFlame();
    }

    public function __toString() {
        return 'Дерево';
    }
}
<?php

namespace App\Lesson2;

class Turkey extends Bird {
    public function say()
    {
        echo "Говорит индюк";
    }

    public function walk()
    {
        echo "Топ топ топ";
    }
}
<?php

namespace App\Lesson2;

class SomePlane extends Plane {
    protected function flyProcess()
    {
        $this->addLog('ЛЕЧУ ВЫСОКО<br>');
    }
}
<?php

namespace App\Lesson2;

class Engineer {
    private BlackBox $blackBox;
    public function setBox(BlackBox $blackBox) {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane) {
        $plane->getBoxForEngineer($this);
    }

    public function decodeBox() {
        echo $this->blackBox->getDataByEngineer($this);
    }
}
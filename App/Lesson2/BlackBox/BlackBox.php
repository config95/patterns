<?php

namespace App\Lesson2;

class BlackBox {
    private $data;

    public function addLog($message) {
        $this->data .= $message;
    }

    public function getDataByEngineer(Engineer $engineer) {
        return $this->data;
    }
}
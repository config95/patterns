<?php

namespace App\Lesson2;

class Plane {
    protected BlackBox $blackBox;

    public function __construct()
    {
        $this->blackBox = new BlackBox();
    }

    public function flyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
        }

    protected function flyProcess()
    {
        $this->addLog('Летим<br>');
    }

    private function crushProcess()
    {
        $this->blackBox->addLog('Падаем<br>');
    }

    protected function addLog($message) {
        $this->blackBox->addLog($message);
    }

    public function getBoxForEngineer(Engineer $engineer) {
        $engineer->setBox($this->blackBox);
    }
}
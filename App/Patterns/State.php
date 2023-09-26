<?php

namespace State;

interface State {
    public function proceedState(): State;
}

class GreenState implements State {
    public function proceedState(): State
    {
        echo 'Зеленый горит 30 секунд';
        sleep(30);

        for($i = 0; $i < 5; $i++) {
            echo 'Зеленый свет мигает';
            sleep(1);
        }

        return new YellowState();
    }
}

class YellowState implements State {
    public function proceedState(): State
    {
        echo 'Желтый свет горит';
        sleep(10);

        return new RedState();
    }
}

class RedState implements State {
    public function proceedState(): State
    {
        echo 'Красный свет горит';
        sleep(20);

        return new GreenState();
    }
}

class TrafficLights {
    protected State $state;

    public function __construct()
    {
        $this->state = new RedState();
    }

    public function nextColor(): void
    {
        $this->state = $this->state->proceedState();
    }
}


$trafficLights = new TrafficLights();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();
$trafficLights->nextColor();

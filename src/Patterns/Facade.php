<?php

namespace App\Patterns;
/**
 * Паттерн фасад.
 * Применяется для удобного клиентского API.
 * Когда в методе взаимодействуют несколько классов и нужно получить результат.
 */
interface System
{
    public function on();

    public function off();
}

class LightSystem implements System
{
    public function on()
    {
        echo 'Система освещения включена';
    }

    public function off()
    {
        echo 'Система освещения выключена';
    }
}

class ClimateControl implements System
{
    public function on()
    {
        echo 'Система климат контроля включена';
    }

    public function off()
    {
        echo 'Система климат контроля выключена';
    }
}

class AudioVideoSystem implements System
{
    public function on()
    {
        echo 'Система аудио-видео включена';
    }

    public function off()
    {
        echo 'Система аудио-виде выключена';
    }
}

class SystemFacade implements System
{
    protected System $light;
    protected System $audiovideo;
    protected System $climate;

    public function __construct(System $light, System $audiovideo, System $climate)
    {
        $this->light = $light;
        $this->audiovideo = $audiovideo;
        $this->climate = $climate;
    }

    public function on()
    {
        $this->light->on();
        $this->climate->on();
        $this->audiovideo->on();
        echo 'Все системы включены';
    }

    public function off()
    {
        $this->light->off();
        $this->climate->off();
        $this->audiovideo->off();
        echo 'Все системы выключены';
    }
}
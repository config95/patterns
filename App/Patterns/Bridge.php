<?php

/**
 * Структурный
 * Паттерн Мост
 * По сути объект в классе. И Управление этим свойством происходит через абстрактные методы.
 * Применяется во избежания создавать классы для каждой новой связи.
 * Как пример: Есть квадрат и круг. В системе цвета красный и синий. Для того что бы не создавать новые классы типа RedSquare, BlueSquare и тд при добавлении в систему..
 * Для упрощения контроля над связями
 */
abstract class AbstractRemoteControl {
    protected Device $tv;
    protected Device $radio;

    const TYPE_TV = 'TV';
    const TYPE_RADIO = 'RADIO';

    public function __construct(Device $tv, Device $radio)
    {
        $this->tv = $tv;
        $this->radio = $radio;
    }

    public function turnOnTv(): void  {
        $this->tv->turnOn();
    }
    public function turnOffTv(): void  {
        $this->tv->turnOff();
    }

    public function turnOnRadio(): void  {
        $this->radio->turnOn();
    }
    public function turnOffRadio(): void  {
        $this->radio->turnOff();
    }

    public function setChannelTv($channel): void  {
        $this->tv->setChannel($channel);
    }
    public function setChannelRadio($channel): void  {
        $this->radio->setChannel($channel);
    }

    abstract function getInstance($type): Device;
}

interface Device {
    public function turnOn(): bool;
    public function turnOff(): bool;

    public function setChannel($channel): void;
}

class TV implements Device {
    protected $state = false;
    protected $channel = '';
    public function setChannel($channel): void
    {
        $this->channel = $channel;
    }

    public function turnOff(): bool
    {
        $this->state = false;
        return $this->state;
    }

    public function turnOn(): bool
    {
        $this->state = true;
        return $this->state;
    }
}

class Radio implements Device {
    protected $state = false;
    protected $channel = '';
    public function setChannel($channel): void
    {
        $this->channel = $channel;
    }

    public function turnOff(): bool
    {
        $this->state = false;
        return $this->state;
    }

    public function turnOn(): bool
    {
        $this->state = true;
        return $this->state;
    }
}

class RemoteControl extends AbstractRemoteControl {
    public function getInstance($type): Device
    {
        return match ($type) {
            static::TYPE_TV => $this->tv,
            default => $this->radio
        };
    }
}

$tv = new TV();
$radio = new Radio();
$remoteControl = new RemoteControl($tv, $radio);


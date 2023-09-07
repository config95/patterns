<?php

/**
 * Пораждающий
 * Паттерн строитель
 * Служит для облегчения создания нового объекта.
 * Методы - по сути сеттеры для задания свойств новому объекту и метод build() который и создает наш объект.
 */

interface IMachine {
}

class Computer implements IMachine {
    private $processor;
    private $ram;
    private $hard_disk;
    private $gpu;
    private $type;

    /**
     * @return mixed
     */
    public function getProcessor(): string
    {
        return $this->processor;
    }

    /**
     * @param mixed $processor
     */
    public function setProcessor(string $processor): void
    {
        $this->processor = $processor;
    }

    /**
     * @return mixed
     */
    public function getRam(): string
    {
        return $this->ram;
    }

    /**
     * @param mixed $ram
     */
    public function setRam(string $ram): void
    {
        $this->ram = $ram;
    }

    /**
     * @return mixed
     */
    public function getHardDisk(): string
    {
        return $this->hard_disk;
    }

    /**
     * @param mixed $hard_disk
     */
    public function setHardDisk(string $hard_disk): void
    {
        $this->hard_disk = $hard_disk;
    }

    /**
     * @return mixed
     */
    public function getGpu(): string
    {
        return $this->gpu;
    }

    /**
     * @param mixed $gpu
     */
    public function setGpu(string $gpu): void
    {
        $this->gpu = $gpu;
    }

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}

interface IComputerBuilder {
    const TYPE_GAMING = 'gaming';
    const TYPE_WORK = 'work';
    public function set_processor(string $processor): IComputerBuilder;
    public function set_ram(string $ram): IComputerBuilder;
    public function set_hard_disk(string $hard_disk): IComputerBuilder;
    public function set_gpu(string $gpu = null): IComputerBuilder;
    public function getComputer(): IMachine;
}
class ComputerBuilder implements IComputerBuilder {
    private $computer;

    public function __construct($type) {
        $this->computer = new Computer();

        switch ($type) {
            case static::TYPE_GAMING:
                $this->computer->setType(static::TYPE_GAMING);
                break;
            case static::TYPE_WORK:
                $this->computer->setType(static::TYPE_WORK);
                break;
        }
    }

    public function getComputer(): IMachine {
        if ($this->computer->getRam() && $this->computer->getHardDisk()) {
            return $this->computer;
        } else {
            throw new Exception('Не задана оперативная память, либо жесткий диск');
        }

    }
    public function set_gpu(string $gpu = null): ComputerBuilder {
        $this->computer->setGpu($gpu);
        return $this;
    }
    public function set_hard_disk(string $hard_disk): ComputerBuilder {
        $this->computer->setHardDisk($hard_disk);
        return $this;
    }

    public function set_processor(string $processor): ComputerBuilder {
        $this->computer->setProcessor($processor);
        return $this;
    }

    public function set_ram(string $ram): IComputerBuilder {
        $this->computer->setRam($ram);
        return $this;
    }
}

$bulder = new ComputerBuilder(IComputerBuilder::TYPE_GAMING);
$computer =
    $bulder
        ->set_gpu('2gb')
        ->set_hard_disk('1tb')
        ->set_processor('Intel')
        ->set_ram('32gb')
        ->getComputer()
;
$bulder = new ComputerBuilder(IComputerBuilder::TYPE_WORK);
$computer =
    $bulder
        ->set_gpu('2gb')
        ->set_hard_disk('1tb')
        ->set_processor('Intel')
        ->set_ram('32gb')
        ->getComputer()
;

<?php

/**
 * Пораждающий
 * Паттерн фабричный метод.
 *
 * Служит для создания новых инстансов. Применяется, если для создания инстанса нужно применить сложную логику.
 */
interface Car {
    public function drive(): void;
}

class Sedan implements Car {
    public function drive(): void
    {
        echo 'Седан двигается по шоссе.';
    }
}

class Crossover implements Car {
    public function drive(): void
    {
        echo 'Кроссовер двигается по шоссе.';
    }
}

class Truck implements Car {
    public function drive(): void
    {
        echo 'Грузовик двигается по шоссе.';
    }
}

interface CarFactory {
    public static function createCar(): Car;
}

class SedanFactory implements CarFactory {
    public static function createCar(): Car
    {
        return new Sedan();
    }
}

class CrossoverFactory implements CarFactory {
    public static function createCar(): Car
    {
        return new Crossover();
    }
}

class TruckFactory implements CarFactory {
    public static function createCar(): Car
    {
        return new Truck();
    }
}

$sedan = SedanFactory::createCar();
$crossover = CrossoverFactory::createCar();
$truck = TruckFactory::createCar();
$sedan->drive();
$crossover->drive();
$truck->drive();
<?php

/**
 * Порождающий
 * Паттерн абстрактная фабрика
 *
 * Создание семейства взаимосвязанных объектов.
 *
 */
interface IChair {
    public function sit(): void;
}

interface ITable {
    public function draw(): void;
}

interface ICabinet {
    public function open(): void;
}

class ClassicChair implements IChair {
    public function sit(): void
    {
        echo 'Я сел';
    }
}

class ClassicTable implements ITable {
    public function draw(): void
    {
        echo 'Я рисую';
    }
}

class ClassicCabinet implements ICabinet {
    public function open(): void
    {
        echo 'Шкаф открыт';
    }
}

class ModernChair implements IChair {
    public function sit(): void
    {
        echo 'Я сел';
    }
}

class ModernTable implements ITable {
    public function draw(): void
    {
        echo 'Я рисую';
    }
}

class ModernCabinet implements ICabinet {
    public function open(): void
    {
        echo 'Шкаф открыт';
    }
}

interface ICreateFurnitureFactory {
    public static function createFactory($type): FurnitureFactory;
}

interface FurnitureFactory {
    public function createChair(): IChair;
    public function createTable(): ITable;
    public function createCabinet(): ICabinet;
}

class ClassicFurnitureFactory implements FurnitureFactory {
    public function createCabinet(): ICabinet
    {
        return new ClassicCabinet();
    }

    public function createChair(): IChair
    {
        return new ClassicChair();
    }

    public function createTable(): ITable
    {
        return new ClassicTable();
    }
}

class ModernFurnitureFactory implements FurnitureFactory {
    public function createCabinet(): ICabinet
    {
        return new ModernCabinet();
    }

    public function createChair(): IChair
    {
        return new ModernChair();
    }

    public function createTable(): ITable
    {
        return new ModernTable();
    }
}

class CreateFurnitureFactory implements ICreateFurnitureFactory {
    const TYPE_CLASSIC = 'classic';
    const TYPE_MODERN = 'modern';
    public static function createFactory($type): FurnitureFactory
    {
        switch ($type) {
            case static::TYPE_CLASSIC:
                return new ClassicFurnitureFactory();
            case static::TYPE_MODERN:
                return new ModernFurnitureFactory();
        }

        return new ClassicFurnitureFactory();
    }
}

foreach ([CreateFurnitureFactory::TYPE_MODERN, CreateFurnitureFactory::TYPE_CLASSIC] as $type) {
    $factory = CreateFurnitureFactory::createFactory($type);
    $chair = $factory->createChair();
    $table = $factory->createTable();
    $cabinet = $factory->createCabinet();

    $chair->sit();
    $table->draw();
    $cabinet->open();
}


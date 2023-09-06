<?php

/**
 * Пораждающий
 * Паттерн Прототип
 * Применяется для классов, чье создание объектов стоит дорого
 * Суть паттерна в реализации абстрактного метода __clone. Обязательно реализовывать в этом методе свойства - объекты. Так как склонирует все свойства объекты по ссылке.
 * По сути для того что бы выполнить глубокое копирование объекта
 */
interface hasMethodClone {
    public function __clone();
}

interface IFigure {

}

class Figure implements IFigure, hasMethodClone {
    private $width, $height, $shape, $color;
    public function __clone() {}

    public function __construct($width, $height, $shape, $color)
    {
        $this->height = $height;
        $this->width = $width;
        $this->shape = $shape;
        $this->color = $color;
    }
}

class Square extends Figure {
    public function __construct($size, $color)
    {
        parent::__construct($size, $size, 'Квадрат', $color);
    }
}

$figure1 = new Figure(10, 20, 'Овал', 'Зеленый');
$figure2 = clone $figure1;

$square = new Square(10, 'Зеленый');
$square2 = clone $square;
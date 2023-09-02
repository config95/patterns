<?php

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
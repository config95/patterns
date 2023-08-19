<?php
namespace App\Lesson1;

class HungryCat {
    public $name;
    public $color;
    public $favoriteFood;

    public function __construct($name, $color, $favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food) {
        echo "Голодный кот {$this->name}, особые приметы: цвет - {$this->color}, съел $food <br>";
        if ($food === $this->favoriteFood) {
            echo "и замурчал 'мррррр' от своей любимой еды <br>";
        }
    }
}
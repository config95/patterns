<?php

namespace App\Lesson3\BoxWithBalls;

class Box {
    public function putBall(Ball $ball)  {
        Ball::$count += 1;
        return "В корзину добавлен мяч";
    }
}
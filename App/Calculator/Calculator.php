<?php
namespace App;

class Calculator {
    public static function calculate(int $number1, int $number2, callable $func) {
        return $func($number1, $number2);
    }
}
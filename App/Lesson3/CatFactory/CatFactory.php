<?php

namespace App\Lesson3\CatFactory;

class CatFactory {
    public static function getBlack8AgeOldCat($name) {
        return new Cat($name, 'black', 8);
    }
    public static function getBlue4AgeOldCat($name) {
        return new Cat($name, 'blue', 4);
    }
    public static function getWhite2AgeOldCat($name) {
        return new Cat($name, 'white', 2);
    }
    public static function getGrey7AgeOldCat($name) {
        return new Cat($name, 'grey', 7);
    }
}
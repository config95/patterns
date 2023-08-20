<?php

namespace App;

class Display {
    public static function show($formatter, $string) {
        if ($formatter instanceof Renderable) {
            $formatter->render($string);
            return;
        }

        if ($formatter instanceof Formatter) {
            echo $formatter->format($string);
            return;
        }

        if (is_object($formatter) && method_exists($formatter, 'format')) {
            echo $formatter->format($string);
            return;
        }

        echo $string;
    }
}
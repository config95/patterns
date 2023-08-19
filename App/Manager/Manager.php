<?php

namespace App;

class Manager {
    public function place($item) {
        if (is_object($item)) {
            $class = get_class($item);

            if ($item instanceof Papers) {
                echo "Положил $class на стол<br>";
                return;
            }

            if ($item instanceof Instrument) {
                echo "Убрал $class внутрь стола<br>";
                return;
            }

            if ($class) {
                echo "Выкинул $class в корзину<br>";
            }
        } else {
            echo "Выкинул $item в корзину<br>";
        }
    }
}
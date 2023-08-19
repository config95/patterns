<?php

namespace App\Lesson1;

class Basket {
    private $list = [];

    public function addProduct(Product $product, $quantity) {
        $this->list[] = ['name' => $product->getName(), 'quantity' => $quantity, 'cost' => $product->getPrice()];
        return $this;
    }

    public function getPrice() {
        $total = 0;

        foreach ($this->list as $item) {
            $total += $item['cost'] * $item['quantity'];
        }

        return $total;
    }

    public function describe() {
        foreach ($this->list as $item) {
            echo $item['name'] . ' - ' . $item['cost'] . ' - ' . $item['quantity'] . '<br>';
        }
    }
}
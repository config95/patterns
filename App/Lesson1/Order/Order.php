<?php

namespace App\Lesson1;

class Order {
    private Basket $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return Basket
     */
    public function getBasket(): Basket
    {
        return $this->basket;
    }

    public function getPrice() {
        return $this->basket->getPrice();
    }
}
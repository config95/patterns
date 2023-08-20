<?php

namespace App;

abstract class Item
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function show()
    {
        echo 'Я ' . $this->name;
    }
}
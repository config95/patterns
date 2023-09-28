<?php

namespace App\Patterns;

abstract class AbstractOrderProcessing {
    public function processOrder($items): void
    {
        if ($this->checkStock($items)) {
            $totalCost = $this->calculateTotalCost($items);
            $orderID = $this->createOrderRecord($items, $totalCost);
            $this->notifyCustomer($orderID);
        } else {
            echo "Товары отсутствуют на складе. Заказ не может быть обработан.\n";
        }
    }

    abstract protected function checkStock($items);
    abstract protected function calculateTotalCost($items);
    abstract protected function createOrderRecord($items, $totalCost);
    abstract protected function notifyCustomer($orderID);
}

class OrderProcessing extends \TemplateMethod\AbstractOrderProcessing
{
    protected function createOrderRecord($items, $totalCost)
    {
        return ['items' => $items, 'cost' => $totalCost];
    }

    protected function notifyCustomer($orderID)
    {
        echo 'Ваш заказ ' . $orderID;
    }

    protected function checkStock($items)
    {
        return true;
    }

    protected function calculateTotalCost($items)
    {
        return 300;
    }
}

$process = new OrderProcessing();
$process->processOrder(['Игрушка']);

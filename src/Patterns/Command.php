<?php

/**
 * Паттерн команда.
 * Для очереди комманд.
 *
 */

namespace App\Patterns;
interface Command
{
    public function execute();
}

class Order
{
    private $items = [];

    public function addItem(MenuItem $item)
    {
        $this->items[] = $item;
    }

    public function sendOrder()
    {
        echo 'Заказ отправлен';
    }
}

class MenuItem
{
    private $name;
    private $cost;

    public function __construct(string $name, int $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCost(): int
    {
        return $this->cost;
    }


}

class AddMenuItemToOrderCommand implements Command
{
    private Order $order;
    private MenuItem $menuItem;
    private Receiver $receiver;

    public function __construct(Order $order, MenuItem $menuItem, Receiver $receiver)
    {
        $this->order = $order;
        $this->menuItem = $menuItem;
        $this->receiver = $receiver;
    }

    public function execute(): void
    {
        $this->order->addItem($this->menuItem);
        $this->receiver->setOutput('Добвалена позиция ' . $this->menuItem->getName() . ' по цене: ' . $this->menuItem->getCost());
    }
}

class SendOrderToKitchenCommand implements Command
{
    private Order $order;
    private Receiver $receiver;

    public function __construct(Order $order, Receiver $receiver)
    {
        $this->order = $order;
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->order->sendOrder();
        $this->receiver->setOutput('Заказ отправлен на кухню');
    }
}

class Invoker
{
    private $commands = [];

    public function addCommand(\Command $command)
    {
        $this->commands[] = $command;
    }

    public function run()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}

class Receiver
{
    private $output = [];

    public function setOutput(string $str)
    {
        $this->output[] = $str;
    }

    public function getOutput()
    {
        return join('\n', $this->output);
    }
}

$order = new Order();
$receiver = new Receiver();

$item1 = new MenuItem('Пицца', 10);
$item2 = new MenuItem('Салат', 5);

$addCommand1 = new AddMenuItemToOrderCommand($order, $item1, $receiver);
$addCommand2 = new AddMenuItemToOrderCommand($order, $item2, $receiver);
$sendCommand = new SendOrderToKitchenCommand($order, $receiver);

$invoker = new Invoker();
$invoker->addCommand($addCommand1);
$invoker->addCommand($addCommand2);
$invoker->addCommand($sendCommand);

$invoker->run();

echo $receiver->getOutput();
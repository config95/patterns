<?php

namespace repeat;

interface CommandInterface {
    public function execute();
}

abstract class AbstractCommand implements CommandInterface {
    protected Receiver $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }
}

class Invoker {
    protected array $commands = [];

    public function addCommand(AbstractCommand $command) {
        $this->commands[] = $command;
    }

    public function run() {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}

class Receiver {
    protected array $messages = [];

    public function setMessages(string $message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        return join("\n", $this->messages);
    }
}

class TurnOnLightCommand extends AbstractCommand {
    public function execute()
    {
        return 'Включить светильник';
    }
}

class TurnOffLightCommand extends AbstractCommand {
    public function execute()
    {
        return 'Выключить светильник';
    }
}

class SetTemperatureCommand extends AbstractCommand {
    public function execute()
    {
        return 'Установить температуру';
    }
}

class TurnOnTVCommand extends AbstractCommand {
    public function execute()
    {
        return 'Включить тв';
    }
}

class TurnOffTVCommand extends AbstractCommand {
    public function execute()
    {
        return 'Выключить тв';
    }
}

$invoker = new Invoker();
$receiver = new Receiver();
$invoker->addCommand(new TurnOnLightCommand($receiver));
$invoker->addCommand(new TurnOffLightCommand($receiver));
$invoker->addCommand(new SetTemperatureCommand($receiver));
$invoker->addCommand(new TurnOnTVCommand($receiver));
$invoker->addCommand(new TurnOffTVCommand($receiver));
$invoker->run();
echo $receiver->getMessages();
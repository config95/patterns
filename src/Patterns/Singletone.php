<?php

/**
 * Пораждающий
 * Паттерн Одиночка
 * Для создания всего лишь одного объекта в системе
 * Достигается за счет статического свойства, как правило называется instance. Приватного конструктора. И проверки на существования объекта $instance.
 *
 */

namespace App\Patterns;
interface ILogger
{

}

class Logger
{
    private static $instance;
    private $records = [];

    private function __construct()
    {
    }

    public static function getInstance(): static
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function addMessage(string $message): void
    {
        $this->records[] = $message;
    }

    public function getMessages(): array
    {
        return $this->records;
    }
}

$logger = Logger::getInstance();

$logger->addMessage('1 message');

$logger2 = Logger::getInstance();

$messages = $logger2->getMessages();
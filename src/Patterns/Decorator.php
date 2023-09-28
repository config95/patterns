<?php
/**
 * Структурный
 * Паттерн Декоратор
 *
 * Применяется для того что бы из кусочков собрать въедино целую систему
 * Например: Бронирование отлей, где к каждому номеру идет вай-фай, кондиционер и т.д
 * а так же добавление функциональности без изменения основного класса.
 *
 * Суть в абстракном классе декоратора, в свойстве которое мы сетим через конструктор. А потом через свойства определенные в абстракции им управляем.
 */

namespace App\Patterns;
interface Task
{
    public function getInfo(): string;
}

abstract class TaskDecorator implements Task
{
    protected Task $characteristics;

    public function __construct(Task $characteristic)
    {
        $this->characteristics = $characteristic;
    }

    public function getInfo(): string
    {
        return $this->characteristics->getInfo();
    }
}

class Description extends TaskDecorator
{
    public function getInfo(): string
    {
        return $this->characteristics->getInfo() . ', каждый суслик аграном';
    }
}

class Priority extends TaskDecorator
{
    public function getInfo(): string
    {
        return $this->characteristics->getInfo() . ', максимальный приоритет';
    }
}

class Note extends TaskDecorator
{
    public function getInfo(): string
    {
        return $this->characteristics->getInfo() . ', добавлена заметка';
    }
}

class WebTask implements \Task
{
    public function getInfo(): string
    {
        return ' и все для веб таски';
    }
}

$task = new Description(new Priority(new Note(new WebTask())));
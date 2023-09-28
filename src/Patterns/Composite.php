<?php

/**
 * Структурный
 * Паттерн Компоновщик
 * Применяется на древовидных структурах
 * Условие: Один метод и у листа и у компановщика.
 * Компоновщик в данном примере папка
 * Лист в данном примере файл
 */

namespace App\Patterns;
interface Structure
{
    public function create(): string;
}


class Directory implements \Structure
{
    protected array $list = [];
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addElement(\Structure $element)
    {
        $this->list[] = $element;
        return $this;
    }

    public function create(): string
    {
        $str = 'В папке ' . $this->name . '<br>';

        foreach ($this->list as $item) {
            $str .= $item->create() . '<br>';
        }

        return $str;
    }
}

class File implements Structure
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function create(): string
    {
        return $this->name;
    }
}


$departments = new Directory('departments');
$it = new Directory('IT');
$hr = new Directory('HR');

$ivanov = new File('Иванов.txt');
$petrov = new File('Петров.txt');
$sidorov = new File('Сидоров.txt');
$kireev = new File('Киреев.txt');

$structure = $departments
    ->addElement(
        $it
            ->addElement($ivanov)
            ->addElement($petrov)
    )
    ->addElement(
        $hr
            ->addElement($sidorov)
            ->addElement($kireev)
    );

echo $structure->create();
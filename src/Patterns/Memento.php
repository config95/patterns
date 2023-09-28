<?php

/**
 * Паттерн Хранитель
 * Используется, когда должна быть возмозможность откатить изменения в классе.
 * Создаем состояние. Передаем его в управляющий класс. Реализуем в управляющем классе методы работы с хранителем(save и restore). Реализовываем хранитель
 */

namespace App\Patterns;

interface EditorInterface {
    public function undo();
    public function redo();
}

class State {
    const STATE_CREATE = 'created';
    const STATE_UNDO = 'closed';
    const STATE_REDO = 'repeated';

    protected string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function __toString(): string
    {
        return $this->state;
    }
}

class Editor implements EditorInterface {
    protected State $state;

    public function __construct()
    {
        $this->state = new State(State::STATE_CREATE);
    }

    public function undo(): void
    {
        $this->state = new State(State::STATE_UNDO);
    }

    public function redo(): void
    {
        $this->state = new State(State::STATE_REDO);
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function saveToMemento(): Memento
    {
        return new Memento(clone $this->state);
    }

    public function restoreFromMemento(Memento $memento): void
    {
        $this->state = $memento->getState();
    }
}


class Memento {
    protected \Memento\State $state;

    public function __construct(\Memento\State $state)
    {
        $this->state = $state;
    }

    public function getState(): \Memento\State
    {
        return $this->state;
    }
}
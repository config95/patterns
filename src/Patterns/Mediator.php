<?php
/**
 * Паттерн медиатор.
 * Используется для упращении взаимодействия между несколькими классами
 * Главное что бы медиатор реализовывал действия каждого из них
 * И у каждого из них действия были направлены на реализацию через медиатор
 */
namespace App\Patterns;

interface MediatorInterface {
    public function sendMessageToGroup(string $message, \Mediator\User $currentUser, \Mediator\Group $group): void;
}

abstract class Colleague {
    protected MediatorInterface $mediator;

    final public function setMediator(MediatorInterface $mediator): void
    {
        $this->mediator = $mediator;
    }
}


class User extends Colleague {
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sendMessageToGroup(string $message, Group $group): void
    {
        $this->mediator->sendMessageToGroup($message, $this, $group);
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Group extends Colleague {
    protected string $name;
    protected array $users = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addUser(User $user) {
        $this->users[] = $user;
        $user->setMediator($this->mediator);
    }

    public function sendMessage(string $message, User $user) {
        return "[" . $this->name ."] " . $user->getName() . ": " . $message . PHP_EOL;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Mediator implements MediatorInterface {
    protected array $chatLog = [];

    public function sendMessageToGroup(string $message, User $currentUser, Group $group): void
    {
        $this->chatLog[$group->getName()][] = $group->sendMessage($message, $currentUser);

        echo join("\n", $this->chatLog[$group->getName()]);
    }

    public function addGroup(Group $group): void
    {
        $this->chatLog[$group->getName()] = [];
        $group->setMediator($this);
    }
}

$mediator = new Mediator();
$user1 = new User('config');
$user2 = new User('qwerty');
$user3 = new User('admin');
$group1 = new Group('Group 1');
$group2 = new Group('Group 2');
$mediator->addGroup($group1);
$mediator->addGroup($group2);
$group1->addUser($user1);
$group1->addUser($user2);
$group1->addUser($user3);
$group2->addUser($user1);
$group2->addUser($user3);



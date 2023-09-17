<?php
/**
 * Паттерн обсервер.
 * Используется, когда нужна реакция нескрольких класов на оперделенное действие.
 * Реализуем интерфейс обсервера. В свойстве подписчика должен быть массив обсерверов, и все они должны вызывать один метод.
 *
 */
namespace Observer;

interface ObserverInterface {
    public function update($update);
}

class Article {
    protected $name;
    protected $description;
    protected $date;

    public function __construct()
    {
        $this->date = strtotime('Y-m-d');
    }

    public function __toString(): string
    {
        return 'Заголовок: ' . $this->name . '. Описание: ' . $this->description . '. Дата: ' . $this->date . '.';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
}

class User {
    protected \SplObjectStorage $observers;
    protected string $email;

    public function __construct(string $email)
    {
        $this->observers = new \SplObjectStorage();
        $this->email = $email;
    }

    public function attach(ObserverInterface $observer) {
        $this->observers->attach($observer);
    }

    public function detach(ObserverInterface $observer) {
        $this->observers->detach($observer);
    }

    public function emailWasEdited($email) {
        $this->email = $email;

        foreach ($this->observers as $observer) {
            $observer->update('New email ' . $email . '.');
        }
    }

    public function publishArticle(Article $article) {
        foreach ($this->observers as $observer) {
            $observer->update($article);
        }
    }

    public function newMessage(string $message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

class Observer implements ObserverInterface {
    public function update($update)
    {
        echo $update;
    }
}

$user = new User('i.andreev@fdsdsa.ru');
$article = new Article();
$article->setName('Новость');
$article->setName('Какая то новость или статья');

$observer = new Observer();
$user->attach($observer);

$user->newMessage('Message');
$user->emailWasEdited('newmail@dlasdl.ru');
$user->publishArticle($article);
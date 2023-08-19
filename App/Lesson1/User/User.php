<?php
namespace App\Lesson1;

class User {
    public $fullname;
    public $email;
    private $age;
    private $phone;
    private $gender;

    public function __construct($fullname, $email, $gender = 'Не указан', $age = 'Не указан', $phone = 'Не указан')
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function notifyOnEmail($message) {
        return $this->send($message, 'email');
    }
    public function notifyOnPhone($message) {
        return $this->send($message, 'phone');
    }
    private function notify($message) {
        return $this->censor($message);
    }
    private function censor($message) {
        return $message;
    }
    private function send($message, $channel) {
        $text = '';
        if ($channel == 'email') {
            $sendto = $this->email;
        } else {
            $sendto = $this->phone;
        }

        if (!is_int($this->age) || $this->age < 18) {
            $text .= $this->notify('Клиенту нет 18 лет. ');
        }

        return $text . "Уведомление клиенту: {$this->fullname} на {$channel}({$sendto}): {$message}";
    }
}
<?php
namespace App;

class UserFormValidator
{
    public function validate($form) {
        if (empty($form['name']) || empty($form['age']) || empty($form['email'])) {
            throw new \Exception('Заполните все поля', 500);
        }

        if (!is_numeric($form['age'])) {
            throw new \Exception('Возраст должен быть числом', 500);
        }

        if ($form['age'] < 18) {
            throw new \Exception('Возраст должен быть больше 18 лет', 500);
        }

        if (strpos($form['email'], '@') === false) {
            throw new \Exception('Почта должна быть валидна', 500);
        }

        return (bool) rand(0, 1);
    }
}
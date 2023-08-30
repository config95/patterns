<?php
namespace App;

class User
{
    public function load($id)
    {
        if ($id === 0) {
            throw new \Exception('Пользователя не сущетвует');
        }
    }

    public function save($data) {
        try {
            $result = (new UserFormValidator())->validate($data);

            if (!$result) {
                throw new \Exception('Пользователя не создали');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        echo 'Пользователь создан';
        return true;
    }
}
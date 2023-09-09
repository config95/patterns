<?php
/**
 * Паттерн Прокси, применяется для кеширования, контроля, и тд..
 */
interface IFile {
    public function download(): void;
    public function delete(): void;
}

class RealFile implements IFile {
    public function download(): void
    {
        echo 'Скачать файл';
    }

    public function delete(): void
    {
       echo 'Удалить файл';
    }
}

class ProxyFile implements IFile {
    private IFile $file;
    private User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function download(): void
    {
        $access = $this->createFile();

        if ($access)
        $this->file->download();
    }

    public function delete(): void
    {
        $access = $this->createFile();

        if ($access)
        $this->file->delete();
    }

    private function createFile(): bool {
        $return = false;

        if ($this->file === null && $this->user->get_type() === User::TYPE_ADMIN) {
            $this->file = new RealFile();
        }

        if ($this->user->get_type() === User::TYPE_ADMIN) {
            $return = true;
        }

        return $return;
    }
}

class User {
    const TYPE_USER = 'user';
    const TYPE_ADMIN = 'admin';

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function get_type() {
        return $this->type;
    }
}


$user = new User(User::TYPE_USER);
$admin = new User(User::TYPE_ADMIN);

$file = new ProxyFile($user);
$file2 = new ProxyFile($admin);

$file->download();
$file2->download();
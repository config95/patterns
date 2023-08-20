<?php

namespace App;

class Creator
{
    public static function create($name)
    {
        $name[0] = strtoupper($name[0]);
        $namespace = strpos('App\\', $name);
        $classname = $name;

        if ($namespace === false)
        {
            $classname = "App\\" . $name;
        }

        $parts = explode('\\', $name);
        $filename = $parts[array_key_last($parts)];
        $path  = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $name) . '/' . $filename . '.php';

        if (file_exists($path))
        {
            require_once $path;
            return new $classname($name);
        } else
        {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/EmptyItem/EmptyItem.php';
            (new EmptyItem($name))->show();
        }
    }
}
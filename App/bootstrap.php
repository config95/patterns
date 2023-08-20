<?php
function autoload($classname) {
    $namespace = 'App\\';

    $parts = explode('\\', $classname);

    if (strpos($classname, $namespace) !== false)
    {
        array_shift($parts);
    }

    $filename = $parts[array_key_last($parts)] . '.php';
    $parts = implode('/', $parts);
    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts . '/' . $filename;

    if (file_exists($path))
    {
        require_once $path;
    }
}

spl_autoload_register('autoload');
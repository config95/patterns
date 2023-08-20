<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Item/Item.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Creator/Creator.php';

foreach (['cat', 'chicken', 'dog', 'fish', 'snake'] as $class) {
    $animal = \App\Creator::create($class);
    $animal->show();
    echo "<br>";
}
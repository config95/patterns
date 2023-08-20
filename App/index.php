<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Formatter/Formatter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MyFormatter/MyFormatter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Renderable/Renderable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/MyRender/MyRender.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Display/Display.php';

$myObj = new stdClass();
$myObj->format = function ($string) {
  return $string . ' Никогда такого не было и вот опять. Вызов метода в stdClass. Переношу строку.<br>';
};
$strings = ['Разбежавшись прыгну со скалы.', 'Вот я был и вот меня не стало.', 'Проклятый старый дом.', 'Кукла колдуна.', 'И вот строки закончились.'];
$instances = [new \App\MyRender(), new \App\MyFormatter(), $myObj, new stdClass()];

foreach ($strings as $string) {
    foreach ($instances as $instance) {
        \App\Display::show($instance, $string);
    }
}
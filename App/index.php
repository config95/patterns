<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Instrument/Instrument.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Papers/Papers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/Manager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Hammer/Hammer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Document/Document.php';

$manager = new \App\Manager();
$instance1 = new \App\Document();
$instance2 = new \App\Hammer();
$instance3 = new stdClass();
$instance4 = 'string';
$instance5 = 1;

$manager->place($instance1);
$manager->place($instance2);
$manager->place($instance3);
$manager->place($instance4);
$manager->place($instance5);
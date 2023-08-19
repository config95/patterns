<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Animal/Animal.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Bird/Bird.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Hoof/Hoof.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Chicken/Chicken.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Cow/Cow.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Farm/Farm.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Pig/Pig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Turkey/Turkey.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/BirdFarm/BirdFarm.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Farmer/Farmer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Goose/Goose.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Horse/Horse.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Engineer/Engineer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/BlackBox/BlackBox.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Plane/Plane.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/SomePlane/SomePlane.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Forge/Forge.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/BlueFlame/BlueFlame.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Tree/Tree.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Green/Green.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Money/Money.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/RedFlame/RedFlame.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson2/Smoke/Smoke.php';

$chicken = new App\Lesson2\Chicken();
$cow = new App\Lesson2\Cow();
$pig1 = new App\Lesson2\Pig();
$pig2 = new App\Lesson2\Pig();
$farm = new App\Lesson2\Farm();

$farm->addAnimal($chicken);
$farm->addAnimal($cow);
$farm->addAnimal($pig1);
$farm->addAnimal($pig2);

$farm->rollCall();

$farm1 = new App\Lesson2\Farm();
$farm2 = new App\Lesson2\BirdFarm();
$cow = new App\Lesson2\Cow();
$pig1 = new App\Lesson2\Pig();
$pig2 = new App\Lesson2\Pig();
$chicken = new App\Lesson2\Chicken();
$turkey1 = new App\Lesson2\Turkey();
$turkey2 = new App\Lesson2\Turkey();
$turkey3 = new App\Lesson2\Turkey();
$horse1 = new App\Lesson2\Horse();
$horse2 = new App\Lesson2\Horse();
$goose = new App\Lesson2\Goose();
$farmer = new App\Lesson2\Farmer();

$farmer->addAnimal($farm, $cow);
$farmer->addAnimal($farm, $pig1);
$farmer->addAnimal($farm, $pig2);
$farmer->addAnimal($farm, $horse1);
$farmer->addAnimal($farm, $horse2);
$farmer->addAnimal($farm2, $chicken);
$farmer->addAnimal($farm2, $turkey1);
$farmer->addAnimal($farm2, $turkey2);
$farmer->addAnimal($farm2, $turkey3);
$farmer->addAnimal($farm2, $goose);

$plane = new App\Lesson2\Plane();
$plane->flyAndCrush();
$engener = new \App\Lesson2\Engineer();
$engener->takeBox($plane);
$engener->decodeBox();
$plane = new \App\Lesson2\SomePlane();
$plane->flyAndCrush();
$engener->takeBox($plane);
$engener->decodeBox();

$forge = new \App\Lesson2\Forge();
$tree = new \App\Lesson2\Tree();
$green = new \App\Lesson2\Green();
$money = new \App\Lesson2\Money();
$forge->burn($tree);
$forge->burn($green);
$forge->burn($money);
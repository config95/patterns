<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Ball/Ball.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Box/Box.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/CatFactory/CatFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Animal/Animal.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Cat/Cat.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Bear/Bear.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Camel/Camel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Chicken/Chicken.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Elephant/Elephant.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Elk/Elk.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Fish/Fish.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Snake/Snake.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Tiger/Tiger.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/lib.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Writer/Writer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Reader/Reader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Converter/Converter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/Import/Import.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/MyWriter/MyWriter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/MyReader/MyReader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson3/MyConverter/MyConverter.php';

use App\Lesson3\BoxWithBalls\Box;
use App\Lesson3\BoxWithBalls\Ball;

$box = new Box();

for ($i = 0; $i < rand(1, 5); $i++) {
    $ball = new Ball();
    $box->putBall($ball);
}
echo 'мячей - ' . Ball::$count;

$blackCat = \App\Lesson3\CatFactory\CatFactory::getBlack8AgeOldCat('черный Барсик');
$blueCat = \App\Lesson3\CatFactory\CatFactory::getBlue4AgeOldCat('синий Барсик');
$greyCat = \App\Lesson3\CatFactory\CatFactory::getGrey7AgeOldCat('серый Барсик');
$whiteCat = \App\Lesson3\CatFactory\CatFactory::getWhite2AgeOldCat('белый Барсик');

ini_set("xdebug.overload_var_dump", "off");
echo '<pre>';
var_dump(
__FILE__,
__LINE__,
'Igor Andreev',
$blackCat, $blueCat, $greyCat, $whiteCat
);
echo '</pre>';

$bear = new \App\Lesson3\Bear();
$camel = new \App\Lesson3\Camel();
$chicken = new \App\Lesson3\Chicken();
$elephant = new \App\Lesson3\Elephant();
$elk = new \App\Lesson3\Elk();
$fish = new \App\Lesson3\Fish();
$snake = new \App\Lesson3\Snake();
$tiger = new \App\Lesson3\Tiger();

move($bear);
move($camel);
move($chicken);
move($elephant);
move($elk);
move($fish);
move($snake);
move($tiger);

(new \App\Lesson3\Import())
    ->from(new \App\Lesson3\MyReader('Разбежавшись прыгну со скалы. Вот я был и вот меня не стало. И когда об этом узнаешь ты. Тогда поймешь, кого ты потеряла.'))
    ->to(new \App\Lesson3\MyWriter())
    ->with(new \App\Lesson3\MyConverter())
    ->execute();

echo $_SESSION['data'];
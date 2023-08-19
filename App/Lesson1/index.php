<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Cat/Cat.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Dog/Dog.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Fish/Fish.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/HungryCat/HungryCat.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/ToyFactory/ToyFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Toy/Toy.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/User/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Basket/Basket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Product/Product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Lesson1/Order/Order.php';

$cat1 = new App\Lesson1\Cat('Кот 1');
$cat2 = new App\Lesson1\Cat('Кот 2');
$cat3 = new App\Lesson1\Cat('Кот 3');

$dog1 = new \App\Lesson1\Dog('Dog 1');
$dog2 = new \App\Lesson1\Dog('Dog 2');
$dog3 = new \App\Lesson1\Dog('Dog 3');
$dog4 = new \App\Lesson1\Dog('Dog 4');
$dog5 = new \App\Lesson1\Dog('Dog 5');

$fish  = new \App\Lesson1\Fish('Fish');
$hungryCat = new \App\Lesson1\HungryCat('hungry 1', 'blue', 'Орехи');
$hungryCat->eat('Pizza');
$hungryCat->eat('Орехи');
$toyFactory = new \App\Lesson1\ToyFactory;
$name = ['fish', 'dog', 'cat', 'pig', 'chicken'];
$total = 0;

for($i = 0; $i < rand(5, 20); $i++) {
    $instance = $toyFactory->createToy($name[(int)rand(0, 4)]);
    echo $instance->name . ' - ' . $instance->cost . '<br>';
    $total += $instance->cost;
}

echo 'Всего ' . $total . '<br>';

$user = new \App\Lesson1\User('Андреев Игорь Андреевич', 'почта');
echo $user->notifyOnEmail('Message on mail') . '<br>';
echo $user->notifyOnPhone('Message on phone') . '<br>';

$user = new \App\Lesson1\User('Андреев Игорь Андреевич', 'почта', 'Мальчик', 18);
echo $user->notifyOnEmail('Message on mail') . '<br>';
echo $user->notifyOnPhone('Message on phone') . '<br>';

$product1 = new \App\Lesson1\Product('Продукт 1', 1000);
$product2 = new \App\Lesson1\Product('Продукт 2', 2000);
$product3 = new \App\Lesson1\Product('Продукт 3', 3000);
$product4 = new \App\Lesson1\Product('Продукт 4', 4000);
$product5 = new \App\Lesson1\Product('Продукт 5', 5000);
$product6 = new \App\Lesson1\Product('Продукт 6', 6000);

$basket = new \App\Lesson1\Basket();
$basket->addProduct($product1, 1);
$basket->addProduct($product2, 1);
$basket->addProduct($product3, 1);
$basket->addProduct($product4, 1);
$basket->addProduct($product5, 3);
$basket->addProduct($product6, 1);
$basket->describe();

$order = new \App\Lesson1\Order($basket);

echo $order->getPrice();
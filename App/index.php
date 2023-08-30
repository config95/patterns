<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
require_once 'bootstrap.php';
$success = false;

if (!empty($_POST))
{
    try {
        $user = new \App\User();
        $user->load($_POST['id']? (int) $_POST['id'] : 0);
        $user->save($_POST);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation</title>
</head>
<body>
<form action="/" method="POST">
    <input type="hidden" name="id" value="<?= $_GET['id']?? 0?>">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="age">Age</label>
    <input type="text" name="age" id="age">
    <button type="submit">Submit</button>
</form>
</body>
</html>

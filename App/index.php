<?php

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$arrfunc = [
    function($num1, $num2) {
    return $num1 + $num2;
},
    function($num1, $num2) {
    return $num1 - $num2;
},
    function($num1, $num2) {
    return $num1 / $num2;
},
    function($num1, $num2) {
    return $num1 * $num2;
},
    ];

foreach ($arrfunc as $func) {
   echo \App\Calculator::calculate(33, 3, $func);
}
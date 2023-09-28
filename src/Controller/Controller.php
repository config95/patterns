<?php

namespace App\Controller;

use App\Model\Book;
use App\View\View;

class Controller {
    public static function index() {
        return (new View('index', ['title' => 'Title']))->render();
    }

    public static function about() {
        return 'about';
    }

    public static function test($arg1) {
        return "Test page with param1=$arg1";
    }
}
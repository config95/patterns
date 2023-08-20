<?php

namespace App;

class Controller {
    public static function index() {
        return (new View('index', ['title' => 'Title']))->render();
    }

    public static function about() {
        return 'about';
    }
}
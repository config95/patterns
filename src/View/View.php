<?php

namespace App\View;

use App\Renderable\Renderable;

class View implements Renderable
{
    private $view;
    private $data;
    public function __construct($view, $data = [])
    {
        $view = explode('.', $view);
        $view = implode('/', $view);
        $this->view = $_SERVER['DOCUMENT_ROOT'] . '/src/view/' . $view . '.php';
        $this->data = $data;
    }

    public function render()
    {
        $page =  file_get_contents($this->view, true);

        ob_start();
        require_once $this->view;
        $page = ob_get_clean();

        $header = '';
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/src/view/header.php';
        $header = ob_get_clean();

        $footer = '';
        ob_start();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/src/view/footer.php';
        $footer = ob_get_clean();

        $page = str_replace('{{header}}', $header, $page);
        $page = str_replace('{{footer}}', $footer, $page);


        foreach ($this->data as $key => $item) {
            $page = str_replace('{{' . $key . '}}', $item, $page);
        }

        return $page;
    }
}
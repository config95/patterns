<?php

namespace App;

class View implements Renderable
{
    private $view;
    private $data;
    public function __construct($view, $data)
    {
        $view = explode('.', $view);
        $view = implode('/', $view);
        $this->view = $_SERVER['DOCUMENT_ROOT'] . '/view/' . $view . '.php';
        $this->data = $data;
    }

    public function render()
    {
        $page =  file_get_contents($this->view, true);

        ob_start(); //Init the output buffering
        require_once $this->view;
        $page = ob_get_clean(); //Get the buffer and erase it

        foreach ($this->data as $key => $item) {
            $page = str_replace('{{' . $key . '}}', $item, $page);
        }

        return $page;
    }
}
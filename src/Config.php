<?php
namespace App;

class Config {
    protected array $configs = [];
    protected static $instance;
    private function __construct() {
        $this->configs = [
            'db' => require_once 'configs/db.php'
        ];
    }

    public static function getInstance(): static {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function get($config, $default = null) {
        return array_get($this->configs, $config, $default);
    }
}
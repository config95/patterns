<?php

use App\View\View;

function array_get($array, $key, $default = null) {
    $keys = explode('.', $key);
    $value = $array;

    foreach ($keys as $item) {
        if (empty($value[$item])) {
            return $default;
        }

        $value = $value[$item];
    }

    return $value;
}

function includeView($templateName, $data = []) {
    return (new View($templateName, $data))->render();
}
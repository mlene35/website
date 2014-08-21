<?php
spl_autoload_register(function ($class) {

    $class = str_replace('_', '/', $class);
    $class = ucwords($class);

    require_once __DIR__ . '/../lib/' . $class . '.php';
});
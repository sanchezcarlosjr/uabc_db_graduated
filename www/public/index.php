<?php

$dir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
require_once $dir . 'support' . DIRECTORY_SEPARATOR . 'View.php';

spl_autoload_register(function ($class_name) use ($dir) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $file = "{$dir}{$className}.php";
    if (is_readable($file)) {
        require_once $file;
    }
});

require_once $dir . 'web.php';
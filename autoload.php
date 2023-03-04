<?php
function my_autoloader($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        include $path;
    }
}

spl_autoload_register('my_autoloader');
?>
<?php
function autoload($classPath) {
    $classPath = explode('\\', $classPath);
    $className = end($classPath);
    array_pop($classPath);
    include strtolower(implode('/', $classPath)) . '/' . $className . '.php';
}

spl_autoload_register('autoload');
<?php
/**
 * User: Serhii T.
 * Date: 4/27/18
 */

spl_autoload_register(function($class) {
    $arrayPath = explode('\\', $class);
    array_shift($arrayPath);
    $path = implode('/', $arrayPath);
    $classPath = sprintf('src/%s.php', $path);
    require_once $classPath;
});
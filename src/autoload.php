<?php
/**
 * Created by PhpStorm.
 * User: Dozie
 * Date: 9/10/2019
 * Time: 10:13 AM
 */

$autoloader = function ($class_name) {
    if (strpos($class_name, 'Paylot') === 0) {
        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR;
        $file .= str_replace(['Paylot\\', '\\'], ['', DIRECTORY_SEPARATOR], $class_name) . '.php';
        include_once $file;
    }
};

spl_autoload_register($autoloader);
return $autoloader;
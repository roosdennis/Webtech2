<?php
spl_autoload_register(function($className) {
    $path = "../classes/";
    $extension = ".class.php";
    require_once $path . $className . $extension;
});

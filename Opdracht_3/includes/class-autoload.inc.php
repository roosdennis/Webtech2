<?php
//spl_autoload_register(function($className) {
//    $path = "../classes/";
//    $extension = ".class.php";
//    require_once $path . $className . $extension;
//});

spl_autoload_register(function ($className) {
    $path = __DIR__ . '/../classes/';
    $extension = '.class.php';
    $fullPath = $path . $className . $extension;

    // Controleer of het bestand bestaat voordat het wordt geladen
    if (!file_exists($fullPath)) {
        return false;
    }

    require_once $fullPath;
});

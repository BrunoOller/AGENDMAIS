<?php
    session_start();

    $basePath = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = rtrim($basePath, '/') . '/';
    define('BASE_URL', $basePath);

    spl_autoload_register(function ($class) {
        $prefix = 'App\\'; 
        $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR; 
        $relativeClass = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });

    $controllerName = $_GET['controller'] ?? 'Home';
    $actionName = $_GET['action'] ?? 'index';

    $controllerClass = 'App\\Controllers\\' . $controllerName . 'Controller';

    if (!class_exists($controllerClass)) {
        $controllerClass = 'App\\Controllers\\HomeController';
        $actionName = 'index';
    }

    $controller = new $controllerClass();

    if (!method_exists($controller, $actionName)) {
        die("Ação '$actionName' não encontrada.");
    }

    $controller->$actionName();
?>
<?php

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) { // ref to readme
    // now we get $class - CORE\DATABASE so we have to make the forward \ to backward
    $result = str_replace('\\', '/', $class);
    require base_path("{$result}.php");
});

$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//if user send method using hidden html input
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

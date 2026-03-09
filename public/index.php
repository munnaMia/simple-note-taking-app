<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';

session_start(); // starting the session 

require BASE_PATH . 'Core/functions.php';

// spl_autoload_register(function ($class) { // ref to readme
//     // now we get $class - CORE\DATABASE so we have to make the forward \ to backward
//     $result = str_replace('\\', '/', $class);
//     require base_path("{$result}.php");
// });


require base_path('bootstrap.php'); // calling bootstrap file here to use APP class

$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//if user send method using hidden html input
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method); // routing
} catch (ValidationException $exceptation) {

    Session::flash('errors', $exceptation->errors);
    Session::flash('old', [
        'email' => $exceptation->old
    ]);

    return redirect($router->priviousUrl());
}

// unset($_SESSION['_flash']); // clear session
Session::unflash();

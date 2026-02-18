<?php


$routes = require 'routes.php';

function routeToControllers($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code(404);

    require "views/{$code}.view.php";

    die();
}

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToControllers($url, $routes);

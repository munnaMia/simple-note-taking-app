<?php

use Core\Response;

function dumpAndDie($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($status = 404)
{
    http_response_code($status);
    require base_path("views/{$statue}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes); // ref on readme

    require base_path('views/' . $path);
}

function login($user)
{
    // now as the user log in i have to mark that by using session
    $_SESSION['user'] = [
        'email' => $user['email'],
    ]; // user array

    session_regenerate_id(true); // regenarete an unique id for each login
}

function logout()
{
    //clear out session as user log out

    $_SESSION = []; // clear out super global
    session_destroy(); //destory session file

    // delete the cookie 
    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

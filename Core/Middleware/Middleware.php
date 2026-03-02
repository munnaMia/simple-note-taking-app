<?php

use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware
{
    const Map = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];
}

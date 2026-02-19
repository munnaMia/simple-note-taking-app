<?php

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) { // ref to readme
    // now we get $class - CORE\DATABASE so we have to make the forward \ to backward
    $result = str_replace('\\', '/', $class);
    require base_path("{$result}.php");
});

require base_path('Core/router.php');

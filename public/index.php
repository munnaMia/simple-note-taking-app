<?php

const BASE_PATH = __DIR__ . '/../';


require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) { // ref to readme
    require base_path("Core/{$class}.php");
});

require base_path('router.php');

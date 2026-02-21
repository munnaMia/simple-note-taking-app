<?php
// just a simple playground 

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

// Assosiate a builder fn with a string (the string is a key to identify)
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config, 'munna', '3m@MJ#Sha4787mu');
});


App::setContainer($container);

// a database instance fully build up ready to go
$db = $container->resolve('Core\Database');

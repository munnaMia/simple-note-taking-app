<?php

namespace Core;

// we need to build our container at somewhere because we just can't worte a bunch of code to just to init container binders

class App {
    protected static $container;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function getContainer(){
        return static::$container ;
    }
}
<?php

namespace Core;


// Service container... add\bind or remove\resolve

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {

        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for  {$key}"); // thorwing an exception because i don't know what to throw... 
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}

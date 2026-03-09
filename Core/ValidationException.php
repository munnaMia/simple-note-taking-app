<?php

namespace Core;
 
class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throw($errors, $attributes)
    {
        $instance = new static;
        $instance->errors = $errors;
        $instance->old = $attributes;
        return $instance;
    }
}

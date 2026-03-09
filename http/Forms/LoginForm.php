<?php

namespace Http\Forms;

use Attribute;
use Core\Validator;
use Exception;
use ValidationException;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide an valid email address';
        }

        if (! Validator::string($attributes['password'])) {
            $this->errors['password'] = 'provide a valid password';
        }
    }


    public static function  validate($attributes)
    {
        $instance = new static($attributes);

        if ($instance->failed()) {
            // throw new ValidationException(); both impl are same.
            ValidationException::throw($instance->errors(), $instance->attributes);
        }

        return $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $massage)
    {
        $this->errors[$field] = $massage;
    }
}

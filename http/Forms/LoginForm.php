<?php

namespace Http\Forms;

use Core\ValidationException as CoreValidationException;
use Core\Validator;

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

        return $instance->failed() ? $instance->throw() : $instance;

        // if ($instance->failed()) {
        //     // throw new ValidationException(); both impl are same.
        //     // CoreValidationException::throw($instance->errors(), $instance->attributes);
        //     $instance->throw();
        // }

        // return $instance;
    }

    public function throw()
    {
        CoreValidationException::throw($this->errors(), $this->attributes);
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

        return $this;
    }
}

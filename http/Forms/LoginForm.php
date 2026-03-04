<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function  validate($email, $password)
    {
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide an valid email address';
        }
        // 
        if (! Validator::string($password)) {
            $this->errors['password'] = 'provide a valid password';
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $massage){
        $this->errors[$field] = $massage;
    }
}

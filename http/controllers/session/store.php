<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attribute = [
    'email' =>  $_POST['email'],
    'password' => $_POST['password']
]);

$signin = (new Authenticator)->attempt($attribute['email'], $attribute['password']);

if (!$signin) {
    $form->error('email', 'wrong crandential please provied correct crandentials!')->throw();
}
redirect('/');

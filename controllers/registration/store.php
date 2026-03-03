<?php

// validate user input

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];



$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide an valid email address';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'password is need to be 7 char long';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email;', [
    'email' => $email,
])->find(); // check duplicate email

if ($user) {
    // this mean a user already exist with that email.. 
    // If yes, redirect to a login page
    header('location: /'); // send user to login page
    exit();
} else {
    // If not , create one and log user in and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password);', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    login($user);

    header('location: /');
    exit();
}

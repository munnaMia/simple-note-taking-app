<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];



$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please provide an valid email address';
}

if (! Validator::string($password)) {
    $errors['password'] = 'provide a valid password';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // if password match varify user so log in and store hash 
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit;
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'wrong password!'
    ],
]);

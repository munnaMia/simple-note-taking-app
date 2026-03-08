<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'wrong crandential please provied correct crandentials!');
}

// this will persiste to session but we need a flassi session which will expires after a single refreash...
// $_SESSION['errors'] = $form->errors();
// __flashed use underscore to privent collision
// $_SESSION['_flash']['errors'] = $form->errors();

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $email,
]);


return redirect('/login');

// return view('session/create.view.php', [
//     'errors' => $form->errors(),
// ]);

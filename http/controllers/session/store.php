<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

try {
    $form = LoginForm::validate($attribute = [
        'email' =>  $_POST['email'],
        'password' => $_POST['password']
    ]);
} catch (ValidationException $exceptation) {
    // this will persiste to session but we need a flassi session which will expires after a single refreash...
    // $_SESSION['errors'] = $form->errors();
    // __flashed use underscore to privent collision
    // $_SESSION['_flash']['errors'] = $form->errors();

    Session::flash('errors', $exceptation->errors);
    Session::flash('old', [
        'email' => $exceptation->old
    ]);

    return redirect('/login');
}

if ((new Authenticator)->attempt($attribute['email'], $attribute['password'])) {
    redirect('/');
}

$form->error('email', 'wrong crandential please provied correct crandentials!');


// return view('session/create.view.php', [
//     'errors' => $form->errors(),
// ]);

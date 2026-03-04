<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

require base_path('Core/Validator.php');

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body is required under 1000 chars';
}

if (!empty($errors)) {
    // for any issue return the view 
    return view('notes/create.view.php', [
        'headline' => 'Create a new note',
        'errors' => $errors,
    ]);
}

if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body , :user_id);', [
        'body' => $_POST['body'], // form body value
        'user_id' => 3,
    ]);

    // redirect user 
    header('location: /notes');
    exit;
}

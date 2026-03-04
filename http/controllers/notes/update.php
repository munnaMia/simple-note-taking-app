<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentuser = 3; // temp cur user
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_POST['id']
    ]
)->findOrAbort();

authorize($note['user_id'] === $currentuser);



$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body is required under 1000 chars';
}


if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'headline' => 'Your Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}


$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'id'  => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die();

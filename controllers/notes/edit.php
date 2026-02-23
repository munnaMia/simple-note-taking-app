<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentuser = 3; // temp cur user
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrAbort();

authorize($note['user_id'] === $currentuser);

view('notes/edit.view.php', [
    'headline' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
<?php

use Core\App;
use Core\Database;

$currentuser = 3; // temp cur user

$db = App::getContainer()->resolve(Database::class);

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrAbort();

authorize($note['user_id'] === $currentuser);

view('notes/show.view.php', [
    'headline' => 'Your Note',
    'note' => $note,
]);

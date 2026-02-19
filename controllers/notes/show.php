<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrAbort();

$currentuser = 3; // temp cur user

authorize($note['user_id'] === $currentuser);

view('notes/show.view.php', [
    'headline' => 'Your Note',
    'note' => $note,
]);

<?php

use Core\Database;

$currentuser = 3; // temp cur user

$config = require base_path('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // basic auth
    $note = $db->query(
        'SELECT * FROM notes WHERE id = :id',
        [
            'id' => $_GET['id']
        ]
    )->findOrAbort();

    authorize($note['user_id'] === $currentuser);

    // if user send a delete req delete the post 
    $db->query('DELETE FROM notes WHERE id = :id', [
        'id' => $_GET['id']
    ]);

    // after delete a note redirect usr to notes route
    header('location: /notes');
    exit();
} else {
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
}

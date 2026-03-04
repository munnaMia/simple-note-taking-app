<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentuser = 3; // temp cur user
// basic auth
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_POST['id']
    ]
)->findOrAbort();

authorize($note['user_id'] === $currentuser);

// if user send a delete req delete the post 
$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

// after delete a note redirect usr to notes route
header('location: /notes');
exit();

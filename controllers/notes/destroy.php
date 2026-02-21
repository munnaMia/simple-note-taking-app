<?php

use Core\Database;

$currentuser = 3; // temp cur user

$config = require base_path('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');


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

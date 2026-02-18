<?php

$config = require('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');


$headline = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db->query('INSERT INTO notes(body, user_id) VALUES(:body , :user_id);', [
        'body' => $_POST['body'], // form body value
        'user_id' => 3,
    ]);
}
require 'views/note-create.view.php';

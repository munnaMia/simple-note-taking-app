<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');


$headline = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    $validatator = new Validator();

    if (!$validatator->string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body is required under 1000 chars';
    }

    

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body , :user_id);', [
            'body' => $_POST['body'], // form body value
            'user_id' => 3,
        ]);
    }
}
require 'views/note-create.view.php';

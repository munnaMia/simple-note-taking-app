<?php


$config = require('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');

$headline = 'Your Note';


$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrAbort();


$currentuser = 3;

authorize($note['user_id'] === $currentuser);

require 'views/notes/show.view.php';

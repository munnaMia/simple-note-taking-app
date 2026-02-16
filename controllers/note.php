<?php


$config = require('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');

$headline = 'Your Note';


$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->fetch();

require 'views/note.view.php';

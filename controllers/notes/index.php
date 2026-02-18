<?php

$headline = 'All Your Notes';

$config = require('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');

$notes = $db->query('SELECT * FROM notes WHERE user_id = 3')->get();


require 'views/notes/index.view.php';
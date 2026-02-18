<?php


$config = require base_path('config.php');
$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');

$notes = $db->query('SELECT * FROM notes WHERE user_id = 3')->get();

view('notes/index.view.php', [
    'headline' => 'All Your Notes',
    'notes' => $notes,
]);

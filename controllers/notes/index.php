<?php

use Core\App;

$db = App::getContainer()->resolve('Core\Database');

$notes = $db->query('SELECT * FROM notes WHERE user_id = 3')->get();

view('notes/index.view.php', [
    'headline' => 'All Your Notes',
    'notes' => $notes,
]);

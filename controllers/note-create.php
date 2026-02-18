<?php

$headline = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    dumpAndDie($_POST);
}
require 'views/note-create.view.php';

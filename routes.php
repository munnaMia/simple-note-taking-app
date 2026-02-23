<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');

$router->get('/notes/create', 'controllers/notes/create.php'); // show the form
$router->post('/notes', 'controllers/notes/store.php'); // create a new note
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php'); // show edit page
$router->patch('/note', 'controllers/notes/update.php'); // update note

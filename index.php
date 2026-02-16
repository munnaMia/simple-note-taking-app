<?php

require 'functions.php';
require 'database.php';

$id = $_GET['id'];

$config = require('config.php');

$db = new Database($config, 'munna', '3m@MJ#Sha4787mu');



<?php

ini_set('display_errors',1);

define('DSN', 'mysql:dbname=soccer_board;host=localhost;charset=utf8');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

require_once('function.php');
require_once('autoload.php');
require_once('Quiz.php');
require_once('Token.php');

session_start();

<?php
session_start();

require_once __DIR__ . '/../.env.php'; // for DB connection
require __DIR__ . '/../vendor/autoload.php'; //for autoloader

$app = require __DIR__ . '/../bootstrap/app.php';//store our bootstrap as variable app

$app->run(); //run our application

<?php
session_start();

require_once __DIR__ .'/../.env.php';
require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$app->run();

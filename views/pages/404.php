<?php
$title = '404';
$color = 'green';

require_once "models/Exercise.php";

ob_start();
$content = ob_get_clean();
require('views/templates/template.php');
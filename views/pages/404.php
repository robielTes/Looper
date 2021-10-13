<?php
$title = '404';
$color = 'green';

require_once "models/Exercise.php";

if (isset($_POST['submit'])) {
    Exercise::create(['title'=>$_POST['exercise_title'],'states_id'=>'1']);
}

ob_start();
$content = ob_get_clean();
require('views/templates/template.php');
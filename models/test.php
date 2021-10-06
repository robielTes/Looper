<?php
require 'Exercise.php';
//require 'Field.php';
//require 'Answer.php';
//require 'State.php';
//require 'Line.php';

//$exercises = Exercise::index();
$exercises = Exercise::show(9);
//$exercises = Exercise::destroy(3); //X
//$exercises = Exercise::create(['title'=>'pol768io78','states_id'=>'2']);


var_dump($exercises);

//$fields = Field::index();
//$fields = Field::show(5);
//$fields = Field::destroy(3); //X
//$fields = Field::create(['label'=>'pol768io78','lines_id'=>'2','exercises_id'=>'2']);


//var_dump($fields);

//$answer = Answer::index();
//$answer = Answer::show(9);
//$answer = Answer::destroy(3); //X
//$answer = Answer::create(['title'=>'pol768io78','states_id'=>'2']);


//var_dump($answer);

//$state = State::index();
//$state = State::show(9);
//$state = State::destroy(3); //X
//$state = State::create(['title'=>'pol768io78','states_id'=>'2']);


//var_dump($state);

//$line = Line::index();
//$line = Line::show(9);
//$line = Line::destroy(3); //X
//$line = Line::create(['title'=>'pol768io78','states_id'=>'2']);


//var_dump($line);

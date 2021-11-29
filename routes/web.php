<?php

use App\Support\Route;

//================= Home =================
Route::get('/', 'HomeController@home');

//================= Exercises =================
Route::get('/exercises', 'ExerciseController@manage');
Route::get('/exercises/new', 'ExerciseController@create');
Route::get('/exercises/answering', 'ExerciseController@take');
Route::get('/exercises/{id}/fields', 'ExerciseController@show');
Route::post('/exercises/{id}/fields', 'ExerciseController@store');
Route::post('/exercises/{id}/state', 'ExerciseController@update');

//================= Answers =================
Route::post('/exercises/{id}/fulfillments/new', 'AnswerController@create');
Route::post('/exercises/{id}/fulfillments/edit', 'AnswerController@edit');
Route::post('/exercises/{id}/fulfillments/update', 'AnswerController@update');
Route::get('/exercises/{id}/results', 'AnswerController@index');

//================= Fields =================

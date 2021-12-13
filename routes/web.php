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
Route::get('/exercises/{id}/state', 'ExerciseController@update');
Route::get('/exercises/{id}/destroy', 'ExerciseController@destroy');

//================= Answers =================
Route::post('/exercises/{id}/fulfillments/new', 'AnswerController@create');
Route::post('/exercises/{id}/fulfillments', 'AnswerController@store');
Route::get('/exercises/{id}/fulfillments/{fid}/edit', 'AnswerController@edit');
Route::post('/exercises/{id}/fulfillments/{fid}/edit', 'AnswerController@update');
Route::get('/exercises/{id}/results', 'AnswerController@index');
Route::get('/exercises/{id}/results/{rid}', 'AnswerController@show_result');
Route::get('/exercises/{id}/fulfillments/{fid}', 'AnswerController@show_fulfillment');

//================= Fields =================
Route::post('/exercise/{id}/fields', 'FieldController@create');
Route::get('/exercises/{id}/fields/{fid}/edit', 'FieldController@edit');
Route::get('/exercises/{id}/fields/{fid}/destroy', 'FieldController@destroy');
Route::post('/exercises/{id}/fields/{fid}/update', 'FieldController@update');

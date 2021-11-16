<?php

use App\Support\Route;

Route::get('/', 'HomeController@home');
Route::get('/exercises/answering', 'ExerciseController@take');
Route::get('/exercises/new', 'ExerciseController@create');
Route::get('/exercises', 'ExerciseController@manage');
Route::post('/exercises/{id}/fields', 'ExerciseController@store');
Route::get('/exercises/{id}/fields', 'ExerciseController@show');

Route::post('/exercises/{id}/fulfillments/new', 'AnswerController@create');
Route::post('/exercises/{id}/fulfillments/edit', 'AnswerController@edit');

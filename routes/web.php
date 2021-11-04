<?php

use App\Support\Route;

Route::get('/', 'HomeController@home');
Route::get('/exercises/answering', 'HomeController@take');
Route::get('/exercises/new', 'HomeController@create');
Route::get('/exercises', 'HomeController@manage');

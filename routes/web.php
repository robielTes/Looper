<?php

use App\Support\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/{name}/{age}', 'WelcomeController@show');
Route::get('/{name}', 'WelcomeController@delete');

/*$app ->get('/', '\App\Controllers\HomeController@home');
$app ->get('/take', '\App\Controllers\HomeController@take');
$app ->get('/create', '\App\Controllers\HomeController@create');
$app ->get('/manage', '\App\Controllers\HomeController@manage');*/

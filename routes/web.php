<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'PostController@test');

Route::get('/', function () {
    return view('welcome');
});
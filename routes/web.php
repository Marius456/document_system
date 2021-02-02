<?php
 
// Route::get('{any}', function () {
//     return view('app');
// })->where('any', '.*');

// Route::get('/', 'PostController@index');
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'create']);
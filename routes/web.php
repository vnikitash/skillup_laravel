<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'WEB\FirstController@index');



Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'ADMIN\UsersController');
    Route::resource('orders', 'ADMIN\OrdersController');
});

Route::resource('first', 'WEB\FirstController');
Route::get('first/{t1}/{t2}', 'WEB\FirstController@test')->where([
    't1' => '[0-9]+',
    't2' => '[0-9]+',
]);

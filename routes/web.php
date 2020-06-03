<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('posts', "PostsController");

Route::get('asd', function () {
    die("Hello world");
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('users', function () {
        dd(\App\Models\User::all());
    });

    Route::get('posts', function () {
        \App\Models\Post::all();
    });
});

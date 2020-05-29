<?php

use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('mail', 'MailController@send');
Route::get('sms', 'MailController@sms');

Route::get('users', function () {die("asd");});
Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

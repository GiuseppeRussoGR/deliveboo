<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

//Admin Routes
Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function () {
    Route::resource('/user', 'UserController');
});

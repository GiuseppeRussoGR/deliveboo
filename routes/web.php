<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function () {
  Route::resource('/user', 'UserController');
});

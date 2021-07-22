<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

//Admin Routes
Route::prefix('admin')
    ->middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('{id}/statistics', [UserController::class, 'statistics'])->name('restaurant-statistics');
    });

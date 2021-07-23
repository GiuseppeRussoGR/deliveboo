<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Admin Routes
Route::prefix('admin')
    ->middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('{id}/statistics', [UserController::class, 'statistic'])->name('restaurant-statistics');
        Route::get('/list-order', [UserController::class, 'listOrder'])->name('restaurant-listOrder');
    });

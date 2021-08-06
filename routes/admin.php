<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

//Admin Routes

Route::resource('/user', UserController::class);
Route::get('{id}/statistics', [UserController::class, 'statistic'])->name('restaurant-statistics');
Route::get('/list-order', [UserController::class, 'listOrder'])->name('restaurant-listOrder');

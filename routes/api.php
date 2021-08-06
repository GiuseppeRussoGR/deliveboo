<?php

use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//API Type Restaurants and Dishes
Route::get('/types', [UsersController::class, 'type'])->name('types');
Route::get('/restaurants/{id}', [UsersController::class, 'index'])->name('restaurants');
Route::get('/dishes/{id}', [UsersController::class, 'dishes'])->name('dishes');
//API Payment and Order
Route::post('/order', [OrderController::class, 'setOrder'])->name('setOrder');
Route::get('/order/get/{id}', [OrderController::class, 'getOrder'])->name('getOrder');
Route::get('/order/token', [OrderController::class, 'getToken'])->name('getToken');
Route::post('/order/customer', [OrderController::class, 'createCustomer'])->name('createCustomer');
Route::post('/order/payment', [OrderController::class, 'makePayment'])->name('makePayment');
//UserStatistics
Route::get('/admin/{id}/statistics', [UsersController::class, 'statistics'])->name('statistics');


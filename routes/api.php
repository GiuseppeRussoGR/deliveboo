<?php

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

//API Type Restaurants
Route::get('/types', 'Api\UsersController@type')->name('api-types');
Route::get('/restaurants/{id}', 'Api\UsersController@index')->name('api-restaurants');
Route::get('/dishes/{id}', 'Api\UsersController@dishes')->name('api-dishes');
//API Payment and Order
Route::get('/order', [OrderController::class, 'getOrder'])->name('getOrder');
Route::get('/orders/token', [OrderController::class, 'getToken'])->name('getToken');
Route::post('/orders/payment', [OrderController::class, 'makePayment'])->name('makePayment');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SubscriptionController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\OrderController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('register', 'register');
    Route::post('add-location', 'addLocation');
    Route::post('/profile', 'profile');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/index', 'index');
});

Route::controller(SubscriptionController::class)->group(function () {
    Route::get('subscriptions/index', 'index');
});

<?php

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

Route::name('api.')->namespace('Api')->group(function () {
    Route::name('mobile.v1.')->prefix('mobile/v1')->namespace('Mobile\V1')->group(function () {
        Route::view('/documentation', 'api.mobile.v1.documentation')->name('documentation');

        Route::prefix('/auth')->group(function () {
            Route::post('/login', 'AuthController@login')->name('login');
        });

        Route::middleware('check.api_auth')->group(function () {
            Route::prefix('/user')->group(function () {
                Route::get('/profile', 'UserController@profile')->name('profile');
                Route::post('/update-balance', 'UserController@updateBalance')->name('update-balance');
            });

            Route::apiResource('services', 'ServiceController')->only(['index']);
            Route::apiResource('cars', 'CarController')->only(['index']);
        });
    });
});


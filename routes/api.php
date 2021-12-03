<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(['user' => new \App\Http\Resources\UserResource($request->user())]);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('registration', \App\Http\Controllers\Api\Auth\RegisterController::class);
        Route::post('login', \App\Http\Controllers\Api\Auth\LoginController::class);
        Route::post('logout', \App\Http\Controllers\Api\Auth\LogoutController::class)->middleware('auth:api');
});

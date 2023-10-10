<?php

use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'v1', 'as' => 'api.v1.', 'middleware' => 'throttle:60,1',
], function () {
    Route::group(['prefix' => 'web', 'as' => 'web.', 'controller' => WebController::class], function () {
        Route::get('/', 'home')->name('home');
    });

    Route::group(['prefix' => 'panel', 'as' => 'panel.', 'middleware' => 'auth:sanctum'], function () {
        Route::apiResource('users', UserController::class)->only(['index', 'show']);
    });
})->middleware(['auth:sanctum']);

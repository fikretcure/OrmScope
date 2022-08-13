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


Route::controller(\App\Http\Controllers\UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'get');
    Route::get('/position/full', 'getFullInPosition');
    Route::get('/perfection/junior/{age1}/{age2}', 'getJuniorInPerfectionAndAges')->where('age1', '[0-9]+')->where('age2', '[0-9]+');
    Route::get('/city/position/perfection/{age1}/{age2}', 'getCityAndPositionAndPerfectionAndAges')->where('age1', '[0-9]+')->where('age2', '[0-9]+');
});

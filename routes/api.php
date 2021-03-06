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
    return $request->user();
});

Route::resource('categories', App\Http\Controllers\API\CategoryAPIController::class);
Route::resource('entries', App\Http\Controllers\API\EntryAPIController::class)->middleware('auth:sanctum');
Route::get('wallets/month/balance', [App\Http\Controllers\API\WalletAPIController::class, 'monthBalance'])->middleware('auth:sanctum');
Route::get('wallets/balance', [App\Http\Controllers\API\WalletAPIController::class, 'balance'])->middleware('auth:sanctum');

Route::resource('users', App\Http\Controllers\API\UserAPIController::class);

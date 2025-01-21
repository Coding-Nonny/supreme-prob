<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/wallets', [WalletController::class, 'getAllWallets']);
Route::get('/wallets/{id}', [WalletController::class, 'getWalletDetails']);
Route::post('/transfer', [WalletController::class, 'transferMoney']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransactionController;

 Route::apiResource('users', UserController::class);
Route::post('/wallets', [WalletController::class, 'store']);
 Route::get('/wallets/{id}', [WalletController::class, 'show']);
//Transaction routes
Route::post('/wallets/{walletId}/transactions', [TransactionController::class, 'store']);

// Health check endpoint.
Route::get('/health', function () {
    return response()->json(['status' => 'OK'], 200);
});

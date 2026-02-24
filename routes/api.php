<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransactionController;

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/wallets', [WalletController::class, 'store']);
Route::post('/wallets/{walletId}/transactions', [TransactionController::class, 'store']);

//Transaction routes
Route::post('/wallets/{walletId}/transactions', [TransactionController::class, 'store']);

// Health check endpoint
Route::get('/health', function () {
    return response()->json(['status' => 'OK'], 200);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

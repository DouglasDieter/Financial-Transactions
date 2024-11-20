<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Route::prefix('api/transactions', [TransactionController::class, 'store'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)->group(function () {
//     Route::get('/', [TransactionController::class, 'index']);
//     Route::post('/', [TransactionController::class, 'store']);
//     Route::get('/{id}', [TransactionController::class, 'show']);
//     Route::put('/{id}', [TransactionController::class, 'update']);
//     Route::delete('/{id}', [TransactionController::class, 'destroy']);
// });

Route::get('/', function () {
    return view('welcome');
});

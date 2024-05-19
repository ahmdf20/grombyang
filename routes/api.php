<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(TransactionController::class)->group(function () {
    Route::post('/transaction/checkout/{transaction}', 'checkout');
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SaleController;
use App\Http\Controllers\Api\AuthController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('sales', SaleController::class);
    Route::get('/sales/date/{calendar_date}', [SaleController::class, 'showSalesByDate'])->name('sales.showSalesByDate');
});
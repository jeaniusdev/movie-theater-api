<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheaterController;

Route::get('/', [TheaterController::class, 'index']);

Route::post('/', [TheaterController::class, 'show'])->name('theater.show');
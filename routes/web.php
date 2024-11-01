<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/topSellingTheater', function () {
    // 
})->name('topSellingTheater');


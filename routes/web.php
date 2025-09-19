<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/getCar/{client}', [ClientController::class, 'getCar'])->name('clients.car');

Route::resource('clients', ClientController::class);
Route::resource('deals', DealController::class);

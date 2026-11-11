<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

// Route::get('/login', [AuthenticatedSessionController::class]);
// Route::post('/login', [AuthenticatedSessionController::class])->name('login');

// Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('locations', CategoryController::class);
// });

// Route::middleware(['guest'])->group(function () {
    
// });
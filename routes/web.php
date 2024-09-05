<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\featuresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */

Route::get('features', [featuresController::class, 'show'])
->name('features');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservation', [reservationController::class, 'show'])->name('reservation');
    
    Route::get('/dashboard', [dashboardController::class, 'show'])->name('dashboard');


});

require __DIR__.'/auth.php';
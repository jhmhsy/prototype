<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('features', [FeaturesController::class, 'show'])
->name('features');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservation', [ReservationController::class, 'show'])->name('reservation');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});

require __DIR__.'/auth.php';
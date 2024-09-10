<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('features', [FeaturesController::class, 'show'])
->name('features');




Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservation', [ReservationController::class, 'show'])->name('reservation');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});

require __DIR__.'/auth.php';
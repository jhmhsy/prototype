<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\public\FeaturesController;
use App\Http\Controllers\public\ReservationController;

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;

use App\Http\Controllers\admin\EquipmentController;
use App\Http\Controllers\admin\EventsController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\HelpController;
use App\Http\Controllers\admin\MenuController;

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

    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
    Route::resource('equipment', EquipmentController::class);
    Route::get('/events', [EventsController::class, 'index'])->name('events');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
    Route::get('/Menu', [MenuController::class, 'index'])->name('Menu');

 

});

require __DIR__.'/auth.php';
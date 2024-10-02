<?php

use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\CalendarController;
use App\Http\Controllers\Public\FeatureController;
use App\Http\Controllers\Public\ReservationsController;
use App\Http\Controllers\Public\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])
    ->name('welcome');
Route::get('features', [FeatureController::class, 'show'])
    ->name('features');

Route::get('/', [PageController::class, 'index'])
    ->name('welcome');
Route::get('features', [FeatureController::class, 'show'])
    ->name('features');




Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/calendar', [CalendarController::class, 'show'])
    ->name('calendar');
Route::get('/api/reserved-hours', [CalendarController::class, 'getReservedHours']);
Route::get('/booking-status', 'CalendarController@getBookingStatus');

Route::post('/reserve', [ReservationsController::class, 'store'])
    ->name('reserve.store');

Route::get('ticket', [TicketController::class, 'show'])
    ->name('ticket.show');
Route::post('ticket', [TicketController::class, 'store'])
    ->name('ticket.store');
    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    
    Route::post('/equipment/index', [EquipmentController::class, 'store'])->name('equipment.index');

Route::get('/reservation', function () {
    return view('subpages.reservation');
})->name('reservation');

Route::group(['middleware' => ['auth', 'isSuper']], function () {
    Route::resource('roles', RoleController::class);
});

Route::group(['middleware' => ['auth', 'isAdmin']], routes: function () {
    Route::resource('users', UserController::class);
    //Route::get('/users', [UserController::class, 'index'])
    //    ->name('administrator.users.index');
    Route::resource('products', ProductController::class);
    Route::get('/reservations', [ReservationsController::class, 'index'])
        ->name('reservations');
    Route::get('/dashboard', [DashController::class, 'show'])
        ->name('dashboard');
});
Route::get('/reservation', function () {
    return view('subpages.reservation');
})->name('reservation');

Route::prefix('reservations')->group(function () {

    Route::post('/', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::post('/accept/{id}', [ReservationsController::class, 'accept'])->name('reservations.accept');
    Route::post('/reject/{id}', [ReservationsController::class, 'reject'])->name('reservations.reject');
    Route::post('/restore/{id}', [ReservationsController::class, 'restore'])->name('reservations.restore');
    Route::post('/cancel/{id}', [ReservationsController::class, 'cancel'])->name('reservations.cancel');
    Route::post('/delete/{id}', [ReservationsController::class, 'delete'])->name('reservations.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::resource('equipment', EquipmentController::class);
    Route::get('/events', [EventsController::class, 'index'])
        ->name('events');
    Route::get('/feedback', [FeedbackController::class, 'index'])
        ->name('feedback');
    Route::get('/help', [HelpController::class, 'index'])
        ->name('help');

});

//Route::middleware(['auth', ])->group(function(){

//});

require __DIR__.'/auth.php';
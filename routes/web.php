<?php

use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TicketController;
//use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\CalendarController;
use App\Http\Controllers\Public\FeatureController;
use App\Http\Controllers\Public\ReservationsController;
use Illuminate\Support\Facades\Route;



    Route::get('/', [HomeController::class, 'index'])
    ->name('welcome');
    
//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ PUBLIC   

    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::get('/calendar', [CalendarController::class, 'show'])
    ->name('calendar');
    Route::post('/calendar', [ReservationsController::class, 'store'])
    ->name('calendar.store');

    Route::get('/api/reserved-hours', [CalendarController::class, 'getReservedHours']);
    Route::get('/booking-status', 'CalendarController@getBookingStatus');

    Route::post('/reserve', [ReservationsController::class, 'store'])
    ->name('reserve.store');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('features', [FeatureController::class, 'show'])->name('features');
    Route::get('/calendar', [CalendarController::class, 'show'])->name('calendar');
    Route::get('/api/reserved-hours', [CalendarController::class, 'getReservedHours']);
    Route::get('/booking-status', 'CalendarController@getBookingStatus');
    
    Route::post('/reserve', [ReservationsController::class, 'store'])->name('reserve.store');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/reservation', function () {return view('subpages.reservation');})->name('reservation');


    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/settings', [UserController::class, 'settings'])->name('admin.settings'); // Example of another admin route

    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');

    Route::prefix('ticket')->group(function () {
        Route::get('/selection', [TicketController::class, 'show'])->name('ticket.show');
        Route::get('/success', [TicketController::class, 'success'])->name('ticket.success');
        Route::get('/index', [TicketController::class, 'index'])->name('ticket.index');
        Route::post('/success', [TicketController::class, 'store'])->name('ticket.store');
    });


//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ ADMIN


    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/overview', [OverviewController::class, 'index'])->name('administrator.overview');
            Route::get('/reservations', [ReservationsController::class, 'index'])->name('administrator.reservations');
            Route::get('/equipments', [EquipmentController::class, 'index'])->name('administrator.equipments');
            Route::get('/events', [EventsController::class, 'index'])->name('administrator.events');
            Route::get('/tickets', [TicketController::class, 'index'])->name('administrator.tickets');
            Route::get('/users', [UserController::class, 'index'])->name('administrator.users');
            Route::get('/roles', [RoleController::class, 'index'])->name('administrator.roles');
            Route::get('/feedback', [FeedbackController::class, 'index'])->name('administrator.feedback');
            Route::get('/help', [HelpController::class, 'index'])->name('administrator.help');    
        });
        
        Route::prefix('reservations')->group(function () {
            Route::post('/', [ReservationsController::class, 'store'])->name('reservations.store');
            Route::post('/accept/{id}', [ReservationsController::class, 'accept'])->name('reservations.accept');
            Route::post('/reject/{id}', [ReservationsController::class, 'reject'])->name('reservations.reject');
            Route::post('/restore/{id}', [ReservationsController::class, 'restore'])->name('reservations.restore');
            Route::post('/cancel/{id}', [ReservationsController::class, 'cancel'])->name('reservations.cancel');
            Route::post('/delete/{id}', [ReservationsController::class, 'delete'])->name('reservations.delete');
        });
    });

    Route::group(['middleware' => ['auth', 'isSuper']], function () { 
        Route::resource('roles', RoleController::class);
    });
    
    Route::group(['middleware' => ['auth', 'isAdmin']], routes: function () { 
        Route::resource('users', UserController::class);
        Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');
    
    });

//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ PUBLIC / AUTH


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('equipment', EquipmentController::class);
    Route::get('/events', [EventsController::class, 'index'])->name('events');
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});












//------------------ TRASH

//Route::get('/admin', [DashController::class, 'show'])->name('dashboard');

    //Route::post('/equipment/index', [EquipmentController::class, 'index'])->name('equipment.index');
    //Route::get('/events/index', [EventsController::class, 'index'])->name('events.index');
   
//Route::middleware(['auth', ])->group(function(){

//});

require __DIR__.'/auth.php';
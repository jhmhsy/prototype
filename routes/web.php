<?php

use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\CalendarController;
use App\Http\Controllers\Public\FeatureController;
use App\Http\Controllers\Public\ReservationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\PricesController;

use App\Http\Controllers\LinkController;

use App\Http\Controllers\BarcodeController;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\UserServicesController;

Route::get('/services', [UserServicesController::class, 'index'])->name('services.index');
Route::post('/update-id-number', [UserServicesController::class, 'updateIdNumber'])
    ->middleware('auth')
    ->name('update.id_number');





Route::get('/index/link/{id}', [LinkController::class, 'index'])->name('index.link');
Route::post('/link/{member}', [LinkController::class, 'updateIdNumber'])->name('link.update');

Route::view('/export', 'export');
Route::get('/export-members', [MemberController::class, 'exportMembers'])->name('export.members');
Route::get('/export-lockers', [MemberController::class, 'exportLockers'])->name('export.lockers');
Route::get('/export-services', [MemberController::class, 'exportServices'])->name('export.services');
Route::get('/export-treadmills', [MemberController::class, 'exportTreadmills'])->name('export.treadmills');



Route::post('/services/{service}/end', [MemberController::class, 'endService'])->name('services.end');
Route::post('/lockers/{locker}/end', [MemberController::class, 'endLocker'])->name('locker.end');
Route::post('/treadmills/{treadmill}/end', [MemberController::class, 'endTreadmill'])->name('treadmill.end');


Route::post('/members/{member}/renew', action: [MemberController::class, 'renew'])->name('members.renew');


Auth::routes(['verify' => true]);

Route::get('/prices', [PricesController::class, 'index'])->name('price.index');
Route::put('/prices/{id}', [PricesController::class, 'update'])->name('prices.update');


Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner.index');
Route::post('/api/scan', [ScannerController::class, 'process'])->name('scanner.process');

Route::get('/scan', [BarcodeController::class, 'index'])->name('scan.index');
Route::post('/process-barcode', [BarcodeController::class, 'process'])->name('process.barcode');

Route::get('/members/{member}/start-date/{relation}', [MemberController::class, 'getRelationStartDate'])
    ->name('members.get-relation-start-date')
    ->where('relation', 'services|lockers|treadmills');

Route::post('/members/{member}/generate-qrcode', [MemberController::class, 'generateQrCode'])->name('members.generate-qrcode');

Route::get('/members/{member}/latest-start-date', [MemberController::class, 'getLatestStartDate'])
    ->name('members.latest-start-date');

Route::get('/checkin', [CheckinController::class, 'index'])->name('checkin.index');
Route::post('/checkin/{member}', [CheckinController::class, 'checkin'])->name('checkin.store');
Route::get('/checkin/history', [CheckinController::class, 'history'])->name('checkin.history');

Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/index', [MemberController::class, 'index'])->name('members.index');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

Route::post('/members/{id}/extend', [MemberController::class, 'extend'])->name('members.extend');

Route::post('/members/{id}/rent-locker', [MemberController::class, 'rentLocker'])->name('members.rent-locker');
Route::post('/members/{id}/extendTreadmill', [MemberController::class, 'extendTreadmill'])->name('members.extendTreadmill');

Route::post('/pay', [PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/success', [PaymentController::class, 'success']);
Route::get('/cancel', [PaymentController::class, 'cancel']);


// Route::get('/create-payment', [PaymentController::class, 'pay'])->name('payment.create');
// Route::post('/webhook-receiver', [PaymentController::class, 'webhook'])->name('webhook');
// Route::get('/payment-result', [PaymentController::class, 'showResult'])->name('payment.result');


//Welcome Page  

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// use to verify account first from email to login - use later dont delete
// Route::get('/', [HomeController::class, 'index'])->name('welcome')->middleware('verified');

Route::get('/gym-map', [HomeController::class, 'showmap'])->name('gym-map');
//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗣𝗨𝗕𝗟𝗜𝗖


Route::get('/features', [FeatureController::class, 'show'])->name('features');
Route::get('/calendar', [CalendarController::class, 'show'])->name('calendar');
Route::post('/calendar', [ReservationsController::class, 'store'])->name('calendar.store');
Route::get('/api/reserved-hours', [CalendarController::class, 'getReservedHours']);
Route::get('/booking-status', 'CalendarController@getBookingStatus');

Route::post('/reserve', [ReservationsController::class, 'store'])->name('reserve.store');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::get('/reservation', function () {
    return view('subpages.reservation');
})->name('reservation');

Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/settings', [UserController::class, 'settings'])->name('admin.settings');

// TEMPORARY HIDDEN BECAUSE GYM DONT USE THIS
// Route::prefix('ticket')->group(function () {
//     Route::get('/selection', [TicketController::class, 'show'])->name('ticket.show');
//     Route::get('/success', [TicketController::class, 'success'])->name('ticket.success');
//     Route::get('/index', [TicketController::class, 'index'])->name('ticket.index');
//     Route::post('/success', [TicketController::class, 'store'])->name('ticket.store');
// });


//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗔𝗗𝗠𝗜𝗡


Route::middleware(['auth'])->group(function () {
    // Checks if the auth user has role "is-admin / is-super", if doesnt then abort
    Route::group([
        'middleware' => function ($request, $next) {
            if (Gate::any(['is-admin', 'is-super'])) {
                return $next($request);
            }
            abort(404);
        }
    ], function () {
        Route::prefix('admin')->group(function () {
            Route::get('/overview', [OverviewController::class, 'index'])->name('administrator.overview');

            Route::prefix('reservations')->group(function () {
                //Navigation
                Route::get('/unifiedview', [ReservationsController::class, 'index'])->name('administrator.unifiedview');
                Route::get('/active', [ReservationsController::class, 'active'])->name('administrator.active');
                Route::get('/pending', [ReservationsController::class, 'pending'])->name('administrator.pending');
                Route::get('/suspended', [ReservationsController::class, 'suspended'])->name('administrator.suspended');
                Route::get('/history', [ReservationsController::class, 'history'])->name('administrator.history');

                //button Configuration
                Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations');
                Route::post('/', [ReservationsController::class, 'store'])->name('reservations.store');
                Route::post('/accept/{id}', [ReservationsController::class, 'accept'])->name('reservations.accept');
                Route::post('/reject/{id}', [ReservationsController::class, 'reject'])->name('reservations.reject');
                Route::post('/restore/{id}', [ReservationsController::class, 'restore'])->name('reservations.restore');
                Route::post('/cancel/{id}', [ReservationsController::class, 'cancel'])->name('reservations.cancel');
                Route::post('/delete/{id}', [ReservationsController::class, 'delete'])->name('reservations.delete');
            });

            Route::get('/equipments', [EquipmentController::class, 'index'])->name('administrator.equipments');
            Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipments.store');
            Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('equipments.update');
            Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

            Route::get('/events', [EventsController::class, 'index'])->name('administrator.events');
            Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');
            Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update');
            Route::delete('/events/{id}', [EventsController::class, 'destroy'])->name('events.destroy');


            Route::get('/tickets', [TicketController::class, 'index'])->name('administrator.tickets');
            Route::get('/users', [UserController::class, 'index'])->name('administrator.users');
            Route::get('/roles', [RoleController::class, 'index'])->name('administrator.roles');
            Route::get('/feedback', [FeedbackController::class, 'index'])->name('administrator.feedback');
            Route::get('/help', [HelpController::class, 'index'])->name('administrator.help');


            // TEMPORARY HIDDEN BECAUSE GYM DONT USE THIS
            // Route::prefix('ticket')->group(function () {
            //     Route::get('/scan', [TicketController::class, 'showScanPage'])->name('ticket.scan');
            //     Route::get('/transaction', [TicketController::class, 'transaction'])->name('ticket.transaction');
            //     Route::post('/scan', [TicketController::class, 'scanTicket'])->name('ticket.scanticket');
            //     Route::post('/scan/claim', [TicketController::class, 'claimTicket'])->name('ticket.claim');
            // });

        });
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });
});




//⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗣𝗨𝗕𝗟𝗜𝗖 / 𝗔𝗨𝗧𝗛

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('equipment', EquipmentController::class);
    Route::get('/events', [EventsController::class, 'index'])->name('events');
    // TEMPORARY HIDDEN BECAUSE GYM DONT USE THIS
    // Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});



//});

require __DIR__ . '/auth.php';
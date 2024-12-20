<?php

use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\CheckinController;
use App\Http\Controllers\Admin\ConfirmationController;
use App\Http\Controllers\Admin\DailysalesController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PricesController;
use App\Http\Controllers\Admin\ProductsalesController;
use App\Http\Controllers\Admin\QuestionController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\UserServicesController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

// Global Rate limiter
Route::middleware(['throttle:global'])->group(function () {
    Auth::routes(['verify' => true]);




    // public rani kay ambot di mo work ig ibutang sa admin ahhahaha
    // Service Autoset Latest Dates : used to auto set the dates when extending services
    Route::get('/members/{member}/start-date/{relation}', [MemberController::class, 'getRelationStartDate'])
        ->name('members.get-relation-start-date')
        ->where('relation', 'services|lockers|treadmills');
    Route::get('/members/{member}/latest-start-date', [MemberController::class, 'getLatestStartDate'])
        ->name('members.latest-start-date');



    // Extra : I forgot what this are for fucks
    Route::get('/scanner', [ScannerController::class, 'index'])->name('scanner.index');
    Route::post('/api/scan', [ScannerController::class, 'process'])->name('scanner.process');




    //⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗣𝗨𝗕𝗟𝗜𝗖


    //Welcome Page
    Route::get('/', [HomeController::class, 'index'])->name('welcome');

    // Developers ? 
    Route::get('/developers', function () {
        return view('subpages.developers');
    })->name('developers');

    // About us
    Route::get('/about-us', function () {
        return view('subpages.aboutus');
    })->name('about-us');

    // others
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/settings', [UserController::class, 'settings'])->name('admin.settings');

    //⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗣𝗨𝗕𝗟𝗜𝗖 / 𝗔𝗨𝗧𝗛

    Route::middleware('auth')->group(function () {

        // My Services Link
        Route::get('/services', [UserServicesController::class, 'index'])->name('services.index');
        Route::post('/update-id-number', [UserServicesController::class, 'updateIdNumber'])->name('update.id_number');

        // Profile / Settings
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // homepage I dont know
        Route::resource('equipment', EquipmentController::class);
        Route::get('/events', [EventsController::class, 'index'])->name('events');

        // haha
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
        Route::get('/help', [HelpController::class, 'index'])->name('help');
    });


    //⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎⏹︎ 𝗔𝗗𝗠𝗜𝗡

    Route::middleware(['auth'])->group(function () {
        // Checks if the auth user has role " system-admin", if doesnt then abort
        Route::group([
            'middleware' => function ($request, $next) {
                if (Gate::allows('system-admin')) {
                    return $next($request);
                }
                abort(404);
            },
        ], function () {
            Route::prefix('admin')->group(function () {

                // Overview
                Route::get('/overview', [OverviewController::class, 'index'])->name('administrator.overview');

                // Services & Asset
                Route::get('/asset', [AssetController::class, 'index'])->name('administrator.asset');


                // Member COntrols
                Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
                Route::post('/members', [MemberController::class, 'store'])->name('members.store');
                Route::get('/members/index', [MemberController::class, 'index'])->name('members.index');
                Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
                Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

                // Add / Extend Services
                Route::post('/members/{id}/extend', [MemberController::class, 'extend'])->name('members.extend');
                Route::post('/members/{id}/rent-locker', [MemberController::class, 'rentLocker'])->name('members.rent-locker');
                Route::post('/members/{id}/extendTreadmill', [MemberController::class, 'extendTreadmill'])->name('members.extendTreadmill');

                // End / Cancel Services
                Route::post('/services/{service}/end', [MemberController::class, 'endService'])->name('services.end');
                Route::post('/lockers/{locker}/end', [MemberController::class, 'endLocker'])->name('locker.end');
                Route::post('/treadmills/{treadmill}/end', [MemberController::class, 'endTreadmill'])->name('treadmill.end');

                // Member Links to QR
                Route::get('/index/link/{id}', [LinkController::class, 'index'])->name('index.link');
                Route::post('/link/{member}', [LinkController::class, 'updateIdNumber'])->name('link.update');
                Route::put('/members/{id}/unlink', [LinkController::class, 'unlinkMember'])->name('member.unlink');


                // Member Renewal
                Route::post('/members/{member}/renew', action: [MemberController::class, 'renew'])->name('members.renew');
                Route::post('/members/{member}/changemembership', action: [MemberController::class, 'changemembership'])->name('members.changemembership');

                // Export Members
                Route::get('/export-members', [AssetController::class, 'exportMembers'])->name('export.members');
                Route::get('/export-lockers', [AssetController::class, 'exportLockers'])->name('export.lockers');
                Route::get('/export-services', [AssetController::class, 'exportServices'])->name('export.services');
                Route::get('/export-treadmills', [AssetController::class, 'exportTreadmills'])->name('export.treadmills');
                Route::get('/dailysales/export', [AssetController::class, 'export'])->name('dailysales.export');



                // Admin Confirmatiion
                Route::get('/confirmation', [ConfirmationController::class, 'index'])->name('confirmation.index');

                Route::post('/members/{member}/approve', [ConfirmationController::class, 'approveMemberEnd'])->name('member.approve');
                Route::post('/members/{member}/disapprove', [ConfirmationController::class, 'disapproveMemberEnd'])->name('member.disapprove');
                Route::post('/services/{service}/approve', [ConfirmationController::class, 'approveServiceEnd'])->name('services.approve');
                Route::post('/services/{service}/disapprove', [ConfirmationController::class, 'disapproveServiceEnd'])->name('services.disapprove');
                Route::post('/lockers/{locker}/approve', [ConfirmationController::class, 'approveLockerEnd'])->name('locker.approve');
                Route::post('/lockers/{locker}/disapprove', [ConfirmationController::class, 'disapproveLockerEnd'])->name('locker.disapprove');
                Route::post('/treadmills/{treadmill}/approve', [ConfirmationController::class, 'approveTreadmillEnd'])->name('treadmill.approve');
                Route::post('/treadmills/{treadmill}/disapprove', [ConfirmationController::class, 'disapproveTreadmillEnd'])->name('treadmill.disapprove');

                // Checkin`s
                Route::post('/checkin/{member}', [CheckinController::class, 'checkin'])->name('checkin.store');
                Route::get('/checkin/history', [CheckinController::class, 'history'])->name('checkin.history');

                // Prices
                Route::get('/prices', [PricesController::class, 'index'])->name('price.index');
                Route::put('/prices/{id}', [PricesController::class, 'update'])->name('prices.update');

                // Product Sales
                Route::get('/productsales', [ProductsalesController::class, 'index'])->name('administrator.productsales');
                Route::post('/productsales/store', [ProductsalesController::class, 'store'])->name('productsales.store');
                Route::put('/productsales/{id}', [ProductsalesController::class, 'update'])->name('productsales.update');
                Route::delete('/productsales/{id}', [ProductsalesController::class, 'destroy'])->name('productsales.destroy');

                // Equipments
                Route::get('/equipments', [EquipmentController::class, 'index'])->name('administrator.equipments');
                Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipments.store');
                Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('equipments.update');
                Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy'])->name('equipments.destroy');

                // Events
                Route::get('/events', [EventsController::class, 'index'])->name('administrator.events');
                Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');
                Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update');
                Route::delete('/events/{id}', [EventsController::class, 'destroy'])->name('events.destroy');

                // Tickets
                Route::get('/tickets', [TicketController::class, 'index'])->name('administrator.tickets');
                Route::get('/users', [UserController::class, 'index'])->name('administrator.users');
                Route::get('/roles', [RoleController::class, 'index'])->name('administrator.roles');
                Route::get('/feedback', [FeedbackController::class, 'index'])->name('administrator.feedback');
                Route::get('/help', [HelpController::class, 'index'])->name('administrator.help');

                // Daily Sales
                Route::get('/dailysales', [DailysalesController::class, 'index'])->name('administrator.dailysales');

                // FAQs
                Route::get('/FAQs', [QuestionController::class, 'index'])->name('administrator.FAQs');
                Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
                Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
                Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

                // FAQs / Question 
                Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
                Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
                Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

            });
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
        });
    });



});

require __DIR__ . '/auth.php';
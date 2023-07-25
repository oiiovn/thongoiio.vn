<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Admin\Http\Controllers\Home\HomeController::class, 'index']);

// login
Route::controller(App\Admin\Http\Controllers\Auth\LoginController::class)
->middleware('admin.guest:admin')
->prefix('/login')
->as('login.')
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('post');
});

Route::group(['middleware' => 'admin.auth:admin'], function(){
    Route::group(['middleware' => ['admin.auth.admin:admin']], function(){
        //jobs
        Route::prefix('/jobs')->as('job.')->group(function () {
            Route::controller(App\Admin\Http\Controllers\Job\JobController::class)->group(function () {
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::post('/sao-chep', 'clone')->name('clone');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });

            Route::controller(App\Admin\Http\Controllers\Job\ReportJobController::class)
            ->prefix('/khieu-nai')
            ->as('report.')
            ->group(function(){
                Route::get('/', 'index')->name('index');
            });
        });

        //attributes
        Route::prefix('/attributes')
        ->as('attribute.')
        ->group(function(){
            Route::controller(App\Admin\Http\Controllers\Attribute\AttributeOptionController::class)
            ->as('option.')
            ->group(function(){
                Route::get('/{attribute_id}/options/them', 'create')->name('create');
                Route::get('/{attribute_id}/options', 'index')->name('index');
                Route::get('/options/sua/{id}', 'edit')->name('edit');
                Route::put('/options/sua', 'update')->name('update');
                Route::post('/options/them', 'store')->name('store');
                Route::delete('/{attribute_id}/options/xoa/{id}', 'delete')->name('delete');
            });

            Route::controller(App\Admin\Http\Controllers\Attribute\AttributeController::class)
            ->group(function(){
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
        });
        //Settings
        Route::controller(App\Admin\Http\Controllers\Setting\SettingController::class)
        ->prefix('/settings')
        ->as('setting.')
        ->group(function () {
            Route::get('/general', 'general')->name('general');
            Route::get('/job', 'job')->name('job');
            Route::get('/statistic-virtual', 'statisticVirtual')->name('statistic_virtual');
            Route::put('/update', 'update')->name('update');
        });

        //user
        Route::prefix('/manager-user')->as('user.')->group(function () {
            Route::controller(App\Admin\Http\Controllers\User\UserController::class)->group(function () {
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
            // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
        });

        //admin
        Route::prefix('/manager-admin')->as('admin.')->group(function () {
            Route::controller(App\Admin\Http\Controllers\Admin\AdminController::class)->group(function () {
                Route::get('/them', 'create')->name('create');
                Route::get('/', 'index')->name('index');
                Route::get('/sua/{id}', 'edit')->name('edit');
                Route::put('/sua', 'update')->name('update');
                Route::post('/them', 'store')->name('store');
                Route::delete('/xoa/{id}', 'delete')->name('delete');
            });
            // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
        });
    });

    //news
    Route::prefix('/manager-news')->as('news.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\News\NewsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //privacy
    Route::prefix('/manager-privacy')->as('privacy.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Privacy\PrivacyController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //tutorial
    Route::prefix('/manager-tutorial')->as('tutorial.')->group(function () {
        Route::controller(App\Admin\Http\Controllers\Tutorial\TutorialController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::get('/them', 'create')->name('create');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
    });

    //ckfinder
    Route::prefix('/quan-ly-file')->as('ckfinder.')->group(function () {
        Route::any('/ket-noi', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
            ->name('connector');
        Route::any('/duyet', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
            ->name('browser');
    });

    //dashboard
    Route::get('/dashboard', [App\Admin\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //auth
    Route::controller(App\Admin\Http\Controllers\Auth\ProfileController::class)
    ->prefix('/profile')
    ->as('profile.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });

    //Shop
    Route::controller(App\Admin\Http\Controllers\Shop\ShopController::class)
    ->prefix('/shop')
    ->as('shop.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
        Route::post('/nang-cap/{id}', 'upgrade')->name('upgrade');
        Route::post('/tu-choi/{id}', 'reject')->name('reject');
        Route::get('/dang-ky', 'dangKy')->name('dang-ky');
        Route::post('/uy-tin/{id}', 'uyTin')->name('uy-tin');
    });
    Route::prefix('/giao-dich')
    ->as('transaction.')
    ->group(function () {
        Route::controller(App\Admin\Http\Controllers\Transaction\TransactionController::class)
            ->prefix('/')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/show/{id}', 'show')->name('show');
            });
        Route::controller(App\Admin\Http\Controllers\Transaction\Withdrawn\WithdrawnController::class)
            ->prefix('/rut-tien')
            ->as('withdrawn.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update', 'update')->name('update');
            });
        Route::controller(App\Admin\Http\Controllers\Transaction\Deposit\DepositController::class)
            ->prefix('/nap-tien')
            ->as('deposit.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
            });
    });

    Route::controller(App\Admin\Http\Controllers\Auth\ChangePasswordController::class)
        ->prefix('/password')
        ->as('password.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/', 'update')->name('update');
        });

    Route::prefix('/search')->as('search.')->group(function () {
        Route::prefix('/select')->as('select.')->group(function () {
            Route::get('/user', [App\Admin\Http\Controllers\User\UserSearchSelectController::class, 'selectSearch'])->name('user');
        });
    });

    Route::post('/logout', [App\Admin\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Custom\CustomController;
// Auth
Route::get('/', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('homepage');

Route::get('/custom', [CustomController::class, 'index'])->name('custom');

Route::prefix('/thong-tin')->as('info.')->group(function () {
    Route::controller(App\Http\Controllers\User\OtherController::class)->group(function () {
        Route::get('/nguoi-dung', 'userSearch')->name('search_user');
        Route::get('/search-user', 'userResult')->name('user_result');
        Route::get('/nguoi-dung/{slug}', 'userDetail')->name('user_detail');

        Route::get('/cua-hang', 'shopSearch')->name('search_shop');
        Route::get('/search-shop', 'shopResult')->name('shop_result');
        Route::get('/cua-hang/{slug}', 'shopDetail')->name('shop_detail');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller(App\Http\Controllers\Auth\LoginController::class)
        ->prefix('/dang-nhap')->as('login.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'login')->name('post');
        });

    Route::controller(App\Http\Controllers\Auth\RegisterController::class)
        ->prefix('/dang-ky')->as('register.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'register')->name('post');
        });

    Route::controller(App\Http\Controllers\Auth\ForgotPasswordController::class)
        ->prefix('/quen-mat-khau')->as('password.')
        ->group(function () {
            Route::get('/', 'showForgetPasswordForm')->name('get');
            Route::post('/', 'submitForgetPasswordForm')->name('post');
        });

    Route::controller(App\Http\Controllers\Auth\ForgotPasswordController::class)
        ->prefix('/mat-khau-moi')->as('resetPwd.')
        ->group(function () {
            Route::get('/{token}', 'showResetPasswordForm')->name('get');
            Route::post('/', 'submitResetPasswordForm')->name('post');
        });
});

// User
Route::group(['middleware' => 'auth'], function () {
    Route::post('/dang-xuat', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

    Route::prefix('/thong-tin-tai-khoan')->as('user.')->group(function () {
        Route::controller(App\Http\Controllers\User\UserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'updateInfo')->name('updateInfo');
            Route::post('/doi-mat-khau', 'password')->name('password');

            Route::middleware('auth.member')->group(function(){
                Route::get('/tao-cua-hang', [App\Http\Controllers\User\UserController::class,'createShop'])->name('create_shop');
//                Route::get('/tao-cua-hang', 'createShop')->name('create_shop');
                Route::post('/tao-cua-hang', 'postStore')->name('post_shop');
            });

            Route::middleware('auth.shop')->group(function(){
                Route::get('/cap-nhat-cua-hang', 'editShop')->name('edit_shop');
                Route::post('/cap-nhat-cua-hang', 'updateStore')->name('update_shop');
            });
        });

        Route::prefix('/tai-khoan-ngan-hang')->as('bank.')->group(function () {
            Route::controller(App\Http\Controllers\User\BankController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'create')->name('create');
                Route::get('/xoa/{id}', 'delete')->name('delete');
            });
        });

        Route::prefix('/thong-tin-lien-he')->as('contact.')->group(function () {
            Route::controller(App\Http\Controllers\User\ContactController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'update')->name('update');
            });
        });
    });

    Route::prefix('/danh-gia-ctv')->as('reviews.')->group(function () {
        Route::controller(App\Http\Controllers\Reviews\ReviewsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'create')->name('create');
            Route::get('/xoa/{id}', 'delete')->name('delete');
        });
    });

    Route::prefix('/danh-gia-shop')->as('reviewsShop.')->group(function () {
        Route::controller(App\Http\Controllers\Reviews\ReviewsController::class)->group(function () {
            Route::get('/', 'indexShop')->name('index');
            Route::post('/', 'createShop')->name('create');
            Route::get('/xoa/{id}', 'deleteShop')->name('delete');
        });
    });

    Route::prefix('/giao-dich')->as('transaction.')->group(function () {
        Route::controller(App\Http\Controllers\Transactions\Deposit\DepositController::class)->group(function () {
            Route::prefix('/nap-tien')->as('deposit.')->group(function () {
                Route::get('/tao', 'create')->name('create');
                Route::post('/tao', 'store')->name('store');
                Route::get('/ket-qua', 'result')->name('result');
                Route::get('/', 'show')->name('show');
            });
        });
        Route::controller(App\Http\Controllers\Transactions\Withdrawn\WithdrawnController::class)->group(function () {
            Route::prefix('/rut-tien')->as('withdrawn.')->group(function () {
                Route::get('/tao', 'create')->name('create');
                Route::post('/tao', 'store')->name('store');
                Route::get('/', 'show')->name('show');
            });
        });
        Route::controller(App\Http\Controllers\Transactions\History\HistoryController::class)->group(function () {
            Route::prefix('/lich-su')->as('history.')->group(function () {
                Route::get('/nap', 'deposit')->name('deposit');
                Route::get('/rut', 'withdrawn')->name('withdrawn');
            });
        });
        Route::controller(App\Http\Controllers\Transactions\TransactionController::class)->group(function () {
            Route::get('/thong-ke', 'index')->name('index');
        });
    });
    Route::prefix('/vi-tien')->as('wallet.')->group(function () {
        Route::controller(App\Http\Controllers\Wallet\WalletController::class)->group(function () {
            Route::get('/', 'show')->name('show');
        });
    });
    //jobs
    Route::prefix('/cong-viec')
        ->as('job.')
        ->group(function(){
            Route::controller(App\Http\Controllers\Job\JobController::class)
                ->group(function(){
                    Route::get('/chi-tiet/{slug}', 'show')->name('show');
                    Route::put('/cap-nhat-tien-trinh', 'updateProccess')->name('update_proccess');
                    Route::put('/cap-nhat-lich-su-tien-trinh', 'updateHistoryProccess')->name('update_history_proccess');
                    Route::put('/huy', 'cancel')->name('cancel');
                });

            Route::middleware('auth.shop')->controller(App\Http\Controllers\Job\JobManagerController::class)
                ->prefix('/quan-ly')
                ->as('manager.')
                ->group(function(){
                    Route::get('/danh-sach/{status}', 'index')->name('index');
                    Route::get('/them', 'create')->name('create');
                    Route::get('/chi-tiet/{slug}', 'show')->name('show');
                    Route::put('/cap-nhat-trang-thai', 'updateStatus')->name('update_status');
                    Route::post('/them', 'store')->name('store');
                    Route::post('/sao-chep', 'clone')->name('clone');
                });

            Route::controller(App\Http\Controllers\Job\JobReceivedController::class)
                ->prefix('/nhan-cong-viec')
                ->as('received.')
                ->group(function(){
                    Route::get('/danh-sach/{status}', 'index')->name('index');
                    Route::post('/them', 'store')->name('store');
                    Route::get('/chi-tiet/{slug}', 'show')->name('show');
                    Route::put('/cap-nhat-trang-thai', 'updateStatus')->name('update_status');
                });
        });
});

// Tin tức
Route::prefix('/tin-tuc')->as('news.')->group(function () {
    Route::controller(App\Http\Controllers\News\NewsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'detail')->name('detail');
    });
});

// Chính sách
Route::prefix('/tro-giup')->as('privacy.')->group(function () {
    Route::controller(App\Http\Controllers\Privacy\PrivacyController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'detail')->name('detail');
    });
});

Route::get('/lay-phuong-xa-theo-quan-huyen', [App\Http\Controllers\User\AddressController::class, 'wardOfDistrict']);
Route::get('/lay-quan-huyen-theo-tinh-thanh', [App\Http\Controllers\User\AddressController::class, 'districtOfProvince']);

Route::get('/chartjs', function () {
    return view('chartjs');
})->name('chartjs');
Route::middleware('ip.whitelist')->prefix('/giao-dich')->as('transaction.')->group(function () {
    Route::controller(App\Http\Controllers\Transactions\Deposit\DepositController::class)->group(function () {
        Route::prefix('/nap-tien')->as('deposit.')->group(function () {
            Route::get('/ipn', 'callIPNURL')->name('ipn');
        });
    });
});

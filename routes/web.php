<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\HomeController;

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');

    Route::prefix('user')->group(function() {

    });
    /////ADMIN/////
    Route::prefix('admin')->group(function() {
        // Account
        Route::prefix('account')->group(function() {
            Route::get('list', [AccountController::class, 'view'])->name('admin.list.account.view');
            Route::get('list-internal', [AccountController::class, 'accountInternal'])->name('admin.list.account.internal.view');

            Route::get('view-create', [AccountController::class, 'viewCreate'])->name('admin.create.account.view');
            Route::post('create', [AccountController::class, 'create'])->name('admin.create.account');

            Route::get('edit/{id}', [AccountController::class, 'edit'])->name('admin.edit.account.view');
            Route::post('update', [AccountController::class, 'update'])->name('admin.update.account');

            Route::get('detail-config/{id}', [AccountController::class, 'detailConfig'])->name('admin.detail.account');
            Route::get('search', [AccountController::class, 'search'])->name('admin.search.account');
            Route::get('export', [AccountController::class, 'export'])->name('admin.export.account');

            Route::post('changePassword', [AccountController::class, 'changePassword'])->name('admin.change.password.account');
            Route::post('stop-active-account', [AccountController::class, 'stopActiveAccountUser'])->name('admin.inactive.account');
            Route::post('active-account', [AccountController::class, 'activeAccountUser'])->name('admin.active.account');
            Route::post('stop-active-partner', [AccountController::class, 'stopActivePartner'])->name('admin.inactive.partner');
            Route::post('active-partner', [AccountController::class, 'activePartner'])->name('admin.active.partner');
        });
    });

    ////SUPER ADMIN/////
    Route::prefix('super-admin')->group(function() {

    });
});

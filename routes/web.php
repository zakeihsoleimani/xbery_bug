<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(2);
Route::middleware('auth')->group(function () {

    //آدرس‌های پروژه
    Route::prefix('process')->name('process.')->controller(ProcessController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('show/{bug}', 'show')->name('show');
    });

    //وابستگی‌ها با لاگین
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('guide', 'guide')->name('guide');
        Route::prefix('bug')->name('bug.')->group(function () {
            Route::get('/', 'bug')->name('index');
            Route::get('create', 'bugCreate')->name('create');
            Route::post('store', 'bugStore')->name('store');
            Route::get('show/{bug}', 'bugShow')->name('show');
            Route::post('message/{bug}', 'bugStoreMessage')->name('message');
        });
    });
});
//وابستگی‌ها بدون لاگین
Route::controller(ProfileController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

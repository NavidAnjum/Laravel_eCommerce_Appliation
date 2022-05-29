<?php

use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix'  =>  'admin'], function () {
    Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class,'login'])->name('admin.login.post');
    Route::get('logout', [AdminLoginController::class,'logout'])->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
    });
});

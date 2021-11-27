<?php

use App\Http\Controllers\Admin\AboutusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DigitalBankingController;
use App\Http\Controllers\Admin\FixedController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SavingController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Admin\RemitanceController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'update'])->name('settings.update');
    Route::resource('faqs', FaqController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('news', NewsController::class);
    Route::resource('abouts', AboutusController::class);
});

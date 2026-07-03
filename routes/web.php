<?php

use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;
//Site
Route::get('/', [SiteController::class, 'index']);

Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');

//Auth
Route::middleware('auth')->group(function () {
   //Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::match(['GET', 'POST'], '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->middleware('logout.method')
        ->name('logout');
});

<?php

use App\Http\Controllers\siteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
//Site
Route::get('/', [SiteController::class, 'index']);
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::get('/cadastro',[RegisterController::class, 'index'])->name('register');
Route::post('/cadastro',[RegisterController::class, 'store'])->name('auth.register');

//Auth
Route::middleware('auth')->group(function () {
   //Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::match(['GET', 'POST'], '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
        ->middleware('logout.method')
        ->name('logout');
});

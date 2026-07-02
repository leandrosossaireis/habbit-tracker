<?php

use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::get('/login',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
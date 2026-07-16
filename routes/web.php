<?php

use App\Http\Controllers\siteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitController;
use App\Models\Habit;

//Site
Route::get('/', [SiteController::class, 'index']);
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route::get('/cadastro',[RegisterController::class, 'index'])->name('register');
Route::post('/cadastro',[RegisterController::class, 'store'])->name('auth.register');

//Auth
Route::middleware('auth')->group(function () {
   //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::match(['GET', 'POST'], '/logout', [LoginController::class, 'logout'])->middleware('logout.method')->name('logout');

    //Habits
    Route::get('/dashboard/habits/create', [HabitController::class, 'create'])->name('habits.create');
    Route::post('/dashboard/habits', [HabitController::class, 'store'])->name('habits.store');
    Route::post('/dashboard/habits/{habit}/logs', [HabitController::class, 'storeLog'])->name('habits.logs.store');
    Route::delete('/dashboard/habits/{habit}', [HabitController::class, 'destroy'])->name('habits.destroy');
    Route::get('/dashboard/habits/{habit}/edit', [HabitController::class, 'edit'])->name('habits.edit');
    Route::put('/dashboard/habits/{habit}',[HabitController::class, 'update'])->name('habits.update');
    });

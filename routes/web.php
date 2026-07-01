<?php

use App\Http\Controllers\siteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);


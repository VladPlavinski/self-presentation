<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'show'])->name('page');

Route::get('setLocale', [PageController::class, 'changeLocale']);

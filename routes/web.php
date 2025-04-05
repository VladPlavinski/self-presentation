<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\DocumentController;

Route::get('/', [PageController::class, 'show'])->name('page');

Route::get('setLocale', [PageController::class, 'changeLocale']);

Route::get('document', [DocumentController::class, 'getDocument'])->name('document');

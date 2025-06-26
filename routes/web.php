<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [BoardController::class, 'index']);

Route::get('/settings', [SettingsController::class, 'index']);

Route::get('/boardpost', [BoardController::class, 'postpage']);
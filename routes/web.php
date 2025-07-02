<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BoardController::class, 'index'])->name('home.index');

Route::get('/board/post', [BoardController::class, 'create']);

Route::post('/board/post', [BoardController::class, 'store']);

Route::get('/board/{id}', [BoardController::class, 'show'])->name('boardpost.show');

Route::get('/settings', [SettingsController::class, 'index']);

Route::get('/layout', [BoardController::class, 'postpage']);
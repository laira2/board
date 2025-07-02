<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BoardController::class, 'index'])->name('home.index');

Route::get('/board/post/{id?}', [BoardController::class, 'createPage']);

Route::post('/board/post', [BoardController::class, 'store']);

Route::put('/board/{id}', [BoardController::class, 'update']);

Route::delete('/board/delete/{id}', [BoardController::class, 'destroy']);

Route::get('/board/{id}', [BoardController::class, 'show'])->name('boardpost.show');

Route::get('/settings', [SettingsController::class, 'index']);

Route::get('/layout', [BoardController::class, 'postpage']);
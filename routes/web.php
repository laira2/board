<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TopMenuController;
use Illuminate\Support\Facades\Route;

Route::get('/menu/home', [BoardController::class, 'index'])->name('home.index');

Route::get('/menu/board/post/{id?}', [BoardController::class, 'createPage']);

Route::post('/board/post', [BoardController::class, 'store']);

Route::put('/board/{id}', [BoardController::class, 'update']);

Route::delete('/board/delete/{id}', [BoardController::class, 'destroy']);

Route::get('/board/{id}', [BoardController::class, 'show'])->name('boardpost.show');

Route::get('/menu/settings', [SettingsController::class, 'index']);

Route::post('/comment/post',[CommentController::class,'store']);

Route::get('/settings',[SettingsController::class,'index'])->name('settings.index');

// Route::get('/menu/{code}',[TopMenuController::class,'handle']);

Route::post('/menu/post', [TopMenuController::class, 'store']);

Route::put('/menu/{id}',[TopMenuController::class, 'update']);
<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TopMenuController;
use App\Http\Middleware\LogSearchHistory;
use Illuminate\Support\Facades\Route;

Route::get('/menu/home', [BoardController::class, 'index'])->name('home.index');
Route::get('/', [BoardController::class, 'index'])->name('home.index');

Route::get('/menu/board/post/{id?}', [BoardController::class, 'createPage']);

Route::post('/board/post', [BoardController::class, 'store']);

Route::put('/board/{id}', [BoardController::class, 'update']);

Route::delete('/board/delete/{id}', [BoardController::class, 'destroy']);

Route::delete('/menu/delete/{id}', [TopMenuController::class, 'destroy']);

Route::get('/board/search',[BoardController::class, 'search'])->middleware(LogSearchHistory::class);

Route::get('/menu/search',[TopMenuController::class, 'search'])->middleware(LogSearchHistory::class);;

Route::get('/board/{id}', [BoardController::class, 'show'])->name('boardpost.show');

Route::get('/menu/settings', [SettingsController::class, 'index']);

Route::post('/comment/post',[CommentController::class,'store']);

Route::get('/settings',[SettingsController::class,'index'])->name('settings.index');

// Route::get('/menu/{code}',[TopMenuController::class,'handle']);

Route::post('/menu/post', [TopMenuController::class, 'store']);

Route::put('/menu/{id}',[TopMenuController::class, 'update']);

Route::inertia('/auth/login', 'Auth/Index',[
    'is_login' => 'true'
]);
Route::inertia('/auth/register', 'Auth/Index',[
    'is_login' => 'false'
]);

Route::post('/register',[RegisterController::class, 'store']);

Route::post('/auth/login',[LoginController::class, 'login']);

Route::post('/auth/logout',[LoginController::class,'logout']);

Route::inertia('/calendar', 'Calendar/Index');
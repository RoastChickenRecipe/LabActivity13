<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'loginPage'])->name('show.login');
Route::get('/register', [LoginController::class, 'registerPage'])->name('show.register');
Route::post('/registers', [LoginController::class, 'store'])->name('registers.store');
Route::post('/posts', [LoginController::class, 'login'])->name('login');
Route::post('/logour', [LoginController::class, 'logout'])->name('logout');

Route::resource('blogs', BlogController::class)->middleware(Auth::class);

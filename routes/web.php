<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PollsController;
use App\Http\Middleware\logger;
use Illuminate\Support\Facades\Route;

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('register', function() {
    return view('auth.register');
})->name('register');

Route::get('login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [PollsController::class, 'index'])->name('home')->middleware('auth');

Route::get('/polls/{id}', [PollsController::class, 'show'])->name('polls.show')->middleware('auth')->middleware(logger::class);


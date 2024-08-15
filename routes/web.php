<?php

use App\Http\Controllers\PollsController;
use App\Http\Middleware\logger;
use Illuminate\Support\Facades\Route;

Route::get('/', [PollsController::class, 'index'])->name('home');
Route::get('/polls/{id}', [PollsController::class, 'show'])->name('polls.show')->middleware(logger::class);


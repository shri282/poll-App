<?php

use App\Http\Controllers\PollsController;
use App\Http\Middleware\logger;
use Illuminate\Support\Facades\Route;

Route::get('/', [PollsController::class, 'getPolls']);
Route::get('/polls/{id}', [PollsController::class, 'getPoll'])->middleware(logger::class);


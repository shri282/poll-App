<?php

use App\Http\Controllers\PollsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/polls/add', [PollsController::class, 'addPoll']);
Route::put('/polls/edit', [PollsController::class, 'editpoll']);

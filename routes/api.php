<?php

use App\Http\Controllers\PollsController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/polls/add', [PollsController::class, 'create']);
Route::put('/polls/edit', [PollsController::class, 'update']);
Route::delete('/polls/{id}', [PollsController::class, 'destroy']);

<?php

use App\Http\Controllers\PollsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PollsController::class, 'getCatagories']);


<?php

use Illuminate\Support\Facades\Route;

Route::get('users', \App\Api\Controllers\User\GetUserController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\AppUserController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return '';
});

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


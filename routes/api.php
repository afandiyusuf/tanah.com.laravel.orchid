<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppUserController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\Api\ListingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware([EnsureTokenIsValid::class])->group(function(){
    Route::post('/me',[AppUserController::class, 'me']);
    Route::post('/listing/create',[ListingController::class, 'create']);
    Route::get('/me/listings',[ListingController::class, 'listingMe']);
});

Route::get('/listings', [ListingController::class, 'index']);

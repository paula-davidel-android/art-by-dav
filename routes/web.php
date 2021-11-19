<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

<?php

use App\Http\Controllers\API\PaintingController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'paintings', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [PaintingController::class, 'index']);
    Route::post('add', [PaintingController::class, 'add']);
    Route::get('edit/{id}', [PaintingController::class, 'edit']);
    Route::post('update/{id}', [PaintingController::class, 'update']);
    Route::delete('delete/{id}', [PaintingController::class, 'delete']);
});

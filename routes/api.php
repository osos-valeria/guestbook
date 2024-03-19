<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'index']);
Route::post('/login', [LoginController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/reviews', 'index');
        Route::post('/review', 'store');
    });

    Route::post('/answer', [AnswerController::class, 'store'])->middleware(IsAdmin::class);;
});



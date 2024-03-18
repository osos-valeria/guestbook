<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return csrf_token();
});

//Route::get('/signup', [::class, 'index']);//new
//Route::get('/login', [::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/review', [ReviewController::class, 'store']);
Route::post('/answer', [AnswerController::class, 'store']);

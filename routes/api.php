<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Controller;

//--------------- User ---------------
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class,'register']);

Route::group(['middleware' => 'auth:sanctum',],function ($router) {
    Route::post('/logout', [UserController::class, 'logout']);


});





// Route::get('/users', [UserController::class, 'index']);

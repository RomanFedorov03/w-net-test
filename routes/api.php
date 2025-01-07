<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/create-user', [UserController::class, 'create_user']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/user-info', [UserController::class, 'user_info'])->middleware('auth:sanctum');

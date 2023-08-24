<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class, 'view']);
Route::get('/login',[UserController::class, 'login']);
Route::post('/login',[UserController::class, 'tryLogin']);
Route::get('/register',[UserController::class, 'register']);
Route::post('/registration',[UserController::class, 'registration']);
Route::get('/profile',[UserController::class, 'profile']);
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/update/{id}',[PostController::class, 'updatePost']);
Route::post('/update/{id}',[PostController::class, 'update']);
Route::get('/delete/{id}',[PostController::class, 'deletePost']);
Route::post('/post',[PostController::class, 'post']);

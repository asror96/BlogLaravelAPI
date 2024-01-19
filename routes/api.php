<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Авторизация
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});
//Регистрация
Route::group([], function ($router) {
    Route::post('register', [RegisterController::class,'register']);
});
//Получения по слаг
Route::get('/slug/{slug}',[PostController::class,'slug']);
//Список постов
Route::get('/post/index/',[PostController::class,'index'])->name('index');

//CRUD дял постов
Route::group(['middleware' => 'admin'], function ($router) {
    Route::post('post', [PostController::class,'store']);
    Route::get('post/{id}',[PostController::class,'show']);
    Route::put('post/{id}',[PostController::class,'update']);
    Route::delete('/post/{id}',[PostController::class,'destroy']);

});



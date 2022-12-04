<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication

//2
Route::post('/login', [AuthController::class, 'postLogin']);

//3
Route::post('/register', [AuthController::class, 'postRegister']);

//4
Route::post('/upload', [FileController::class, 'store']);

//4 retrieve all users with files uploaded
Route::get('/info', [FileController::class, 'info']);



Route::delete('/file/{id}', [FileController::class, 'destroy']);

Route::get('/files', [FileController::class, 'index']);



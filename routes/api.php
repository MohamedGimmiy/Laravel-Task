<?php

use App\Http\Controllers\AdminController;
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
Route::post('/login', [AuthController::class, 'postLogin']);


Route::post('/register', [AuthController::class, 'postRegister']);


Route::post('/upload', [FileController::class, 'store']);

// retrieve all users with files uploaded
Route::get('/info', [FileController::class, 'info']);

// delete a file
Route::delete('/file/{id}', [FileController::class, 'destroy']);

// show all files
Route::get('/files', [FileController::class, 'index']);

//Admin routes
//1.
Route::post('/user/create', [AdminController::class, 'store']);
Route::put('/user/update/{id}', [AdminController::class, 'update']);
Route::delete('/user/{id}', [AdminController::class, 'destroy']);

//2.
Route::post('/user',[AdminController::class, 'uploadToUser']);






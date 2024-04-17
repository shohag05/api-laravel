<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/userRegistration', [userController::class, 'userRegistration']);
Route::get('/v1/allUsers', [userController::class, 'allUsers']);

Route::post('/v1/createPost', [postController::class, 'createPost']);
Route::get('/v1/allPosts', [postController::class, 'allPosts']);

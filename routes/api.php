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

Route::get('/', function() {
    return response()->json(['message' => 'This is API routes, Web routes are in /web.']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/user/registration', [userController::class, 'userRegistration']);
Route::get('/v1/users', [userController::class, 'allUsers']);

Route::get('/v1/posts', [postController::class, 'allPosts']);
Route::post('/v1/post/create', [postController::class, 'createPost']);

Route::get('/v1/delay', function() {
    sleep(3); // Delays the response by 3 seconds
    return response()->json(['message' => 'This response was delayed by 3 seconds']);
});


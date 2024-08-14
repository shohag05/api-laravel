<?php

use App\Http\Controllers\BotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bot/{thread_id}', [BotController::class, 'GetThread']);

Route::post('/bot/create_thread', [BotController::class, 'CreateThread']);
// Route::post('/{url}/{title}/{thread_id}', [BotController::class, 'CreateThread']);  // create data with parameter




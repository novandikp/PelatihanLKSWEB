<?php

use App\Http\Controllers\UserController;
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
    return view('users.detail');
});

Route::prefix('user')->group(function () {
    Route::get('/', UserController::class . '@index');
    Route::get('/{id}', UserController::class . '@detail');
    Route::post('/', UserController::class . '@add');
    Route::post('/', UserController::class . '@edit');
    Route::get('/delete/{id}', UserController::class . '@delete');
});

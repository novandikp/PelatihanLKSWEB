<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameAssetController;
use App\Http\Controllers\GameController;
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
    return redirect('/login');
});

// Auth
Route::get("/login", AuthController::class . "@login");
Route::post("/auth", AuthController::class . "@auth");

Route::get("/logout", AuthController::class . "@logout");
Route::middleware(['auth.pub'])->group(function () {
    // USer
    Route::prefix('user')->group(function () {
        Route::get('/', UserController::class . '@index');
        Route::get('/form', UserController::class . '@add');
        Route::get('/form/{id}', UserController::class . '@edit')->name('user.edit');
        Route::get('/delete/{id}', UserController::class . '@delete')->name('user.delete');

        Route::post('/store', UserController::class . '@store');
        Route::post('/update/{id}', UserController::class . '@update');

        Route::get('/{id}', UserController::class . '@detail')->name('user.detail');
    });
});

//Auth Devloper
Route::middleware(['auth.dev'])->group(function () {

    Route::resource('/game', GameController::class);
    Route::get('/gameasset/{id}', GameAssetController::class . '@create')->name('gameasset');
    Route::resource('/asset', GameAssetController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiglyController;
use App\Http\Controllers\RegisterController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [PiglyController::class, 'showLogin'])->name('login');
    Route::post('/login', [PiglyController::class, 'login']);
    Route::get('/register/step1', [RegisterController::class, 'showRegister'])->name('register.step1');
    Route::post('/register/step1', [PiglyController::class, 'postRegister'])->name('register.post');
    Route::get('/register/step2', [PiglyController::class, 'showRegisterStep2'])->name('register.step2.get');
    Route::post('/register/step2', [PiglyController::class, 'createRegister'])->name('register.step2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PiglyController::class, 'showAdmin'])->name('index');
});

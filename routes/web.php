<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Routes
Route::middleware(['auth', 'role:1'])->prefix('admin')->group(function () {

    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('polls', PollingController::class);


});


//User Routes
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Route::get('/polls/{id}', [PollingController::class, 'show'])->name('polls.detail');
    Route::post('/polls/vote', [PollingController::class, 'vote'])->name('polls.vote');
});

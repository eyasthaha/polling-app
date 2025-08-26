<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.get');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

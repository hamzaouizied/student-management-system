<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', action: [LoginController::class, 'login'])->name('login.post');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



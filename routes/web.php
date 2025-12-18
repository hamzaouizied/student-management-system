<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', action: [LoginController::class, 'login'])->name('login.post');
//Dashboard
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', action: [UserController::class, 'index'])->name('users.index');
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
});



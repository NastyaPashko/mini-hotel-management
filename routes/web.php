<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Staff\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth', 'role:admin,manager,receptionist'])
    ->prefix('staff')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('staff.dashboard');
    });

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RoomController;
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
Route::middleware(['auth', 'role:admin,manager'])
    ->prefix('staff')
    ->group(function () {
        Route::GET('rooms', [RoomController::class, 'index'])->name('rooms.index');
        Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');
        Route::delete('rooms/{room}', [RoomController::class, 'delete'])->name('rooms.delete');
        Route::put('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    });
Route::get('/hotel-rooms', [RoomController::class, 'showRoomsPage'])->name('show.rooms');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');
Route::get('/password/reset/sent', [ResetPasswordController::class, 'showResetNotification'])->name('password.sent');
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')
    ->get('/book-room/{room}', [BookingController::class, 'create'])
    ->name('booking.create');
Route::post('/book-room/{room}', [BookingController::class, 'store'])
    ->name('booking.store');
Route::get('/bookings/{booking}/services', [BookingController::class, 'services'])
    ->name('booking.services');

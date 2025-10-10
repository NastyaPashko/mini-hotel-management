<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register',[AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register',[AuthController::class,'register'])->name('register');
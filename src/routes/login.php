<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

Route::get('/login', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'registerForm'])->name('register');
Route::get('/logout', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'logout'])->name('logout');


Route::post('/register', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'registerProcess'])->name('registerProcess');
Route::post('/login', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'loginProcess'])->name('loginProcess');



Route::get('/profile', [\Sashagm\Auth\Http\Controllers\AuthController::class, 'Profile'])->name('profile');
});

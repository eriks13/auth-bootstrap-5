<?php

use App\Http\Controllers\Auth\AuthenticationUserController;
use App\Http\Controllers\Auth\EmailVerificationUserController;
use App\Http\Controllers\Auth\ForgetPasswordUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\ResetPasswordUserController;
use App\Http\Controllers\Auth\SetingUserProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register');

    Route::get('/login', [AuthenticationUserController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticationUserController::class, 'store'])->name('login');
    
    Route::get('/forget-password', [ForgetPasswordUserController::class, 'create'])->name('password.request');
    Route::post('/foregt-password', [ForgetPasswordUserController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordUserController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordUserController::class, 'update'])->name('password.update');
});

Route::middleware('auth')->group(function() {
   
    Route::get('/email/verify', [EmailVerificationUserController::class, 'create'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationUserController::class, 'store'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationUserController::class, 'resend'])
    ->middleware(['throttle:6,1'])
    ->name('verification.send');

    Route::prefix('user')->group(function () {
        Route::get('/profile/{user}', [SetingUserProfileController::class, 'show'])->name('profile.show');
        Route::put('/seting-profile/{user}', [SetingUserProfileController::class, 'update'])->name('update.profile');
    });

   

    Route::post('/logout', [AuthenticationUserController::class, 'destroy'])->name('logout');
});
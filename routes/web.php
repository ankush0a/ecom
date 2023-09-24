<?php

use App\Http\Controllers\Auth\{VerificationController};
use App\Http\Controllers\Backend\{DashboardController};
use App\Http\Controllers\Frontend\{HomeController};
use Illuminate\Support\Facades\{Auth, Route};

// Auth Routes
Auth::routes();

// Fronted Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Verification Routes
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/verification-notification', [VerificationController::class, 'resend'])->name('verification.resend');

// Authentication Routes
Route::middleware(['auth', 'verified'])->group(function () {
  // Profile Routes
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

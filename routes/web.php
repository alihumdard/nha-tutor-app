<?php

use App\Http\Controllers\Admin\CrmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhookController;

Route::get('/', function () {
    $content = \App\Models\HomepageContent::first();
    if (!$content) {
        $content = new \App\Models\HomepageContent();
    }
    return view('pages.welcome', compact('content'));
})->name('home');

Route::post(
    '/stripe/webhook',
    [WebhookController::class, 'handleWebhook']
)->name('cashier.webhook');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('register/verify', [AuthController::class, 'showOtpForm'])->name('register.otp.show');
    Route::post('register/verify', [AuthController::class, 'verifyOtp'])->name('register.otp.verify');
    Route::post('register/resend-otp', [AuthController::class, 'resendOtp'])->name('register.otp.resend');
    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp.form');
    Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.otp.verify');
    Route::get('reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('subscribed')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/quiz', [PageController::class, 'quiz'])->name('quiz');
        Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
        Route::get('/manage/homepage', [CrmController::class, 'edit'])->name('crm.edit');
        Route::post('/manage/homepage', [CrmController::class, 'update'])->name('crm.update');
    });

    Route::get('/subscribe/success', [PaymentController::class, 'success'])->name('subscribe.success');
    Route::get('/subscribe/swap/{priceId}', [PaymentController::class, 'swapPlan'])->name('subscribe.swap');
    Route::post('/subscribe/cancel', [PaymentController::class, 'cancelSubscription'])->name('subscribe.cancel');
    Route::get('/subscribe/{priceId}', [PaymentController::class, 'subscribe'])->name('subscribe');
});

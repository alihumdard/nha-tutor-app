<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\CrmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NotificationController;

Route::get('/run-commands', function (Request $request) {

    Artisan::call('optimize:clear');
    $optimizeClear = Artisan::output();

    Artisan::call('optimize');
    $optimize = Artisan::output();

    Artisan::call('route:clear');
    $routeClear = Artisan::output();

    Artisan::call('config:clear');
    $configClear = Artisan::output();

    Artisan::call('key:generate');
    $keyGenerate = Artisan::output();

    Artisan::call('storage:link');
    $storageLink = Artisan::output();

    return response()->json([
        'message' => 'Selected commands executed successfully.',
        'results' => [
            'optimize:clear' => $optimizeClear,
            'optimize'       => $optimize,
            'route:clear'    => $routeClear,
            'config:clear'   => $configClear,
            'key:generate'   => $keyGenerate,
            'storage:link'   => $storageLink,
        ]
    ]);
});

Route::get('/', function () {
    $content = \App\Models\HomepageContent::first();
    if (!$content) {
        $content = new \App\Models\HomepageContent();
    }
    return view('pages.welcome', compact('content'));
})->name('home');

Route::get('/home', function () {
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
    Route::match(['post','get'],'logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('subscribed')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
        //quiz 
        Route::get('/quizzes', [QuizController::class, 'all_quizzes'])->name('quizzes');
        Route::get('/modules', [QuizController::class, 'all_modules'])->name('modules');
        Route::get('/quiz/{module}', [QuizController::class, 'showQuiz'])->name('quiz');
        Route::post('/quiz/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
        Route::get('/quiz/results/{submission_id}', [QuizController::class, 'showResults'])->name('quiz.results');
        //exam routes
        Route::middleware('plan.access:All In,All or Nothing')->group(function () {
            Route::get('/exam/start', [ExamController::class, 'startExam'])->name('exam.start');
            Route::get('/exam/difficulty', [ExamController::class, 'showExamDifficulty'])->name('exam.difficulty');
            Route::post('/exam/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
         Route::get('/profile', [DashboardController::class, 'showProfile'])->name('profile.show');
         Route::get('/profile/edit', [DashboardController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/manage/homepage', [CrmController::class, 'edit'])->name('crm.edit');
        Route::post('/manage/homepage', [CrmController::class, 'update'])->name('crm.update');
        Route::post('/manage/propet', [CrmController::class, 'propet_update'])->name('propet.update');
        Route::post('/manage/propet/type', [CrmController::class, 'propet_type_update'])->name('propet.type.update');
         Route::get('/users', [CrmController::class, 'index'])->name('users.index');
         Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
    });

    Route::get('/subscribe/success', [PaymentController::class, 'success'])->name('subscribe.success');
    Route::get('/subscribe/swap/{priceId}', [PaymentController::class, 'swapPlan'])->name('subscribe.swap');
    Route::post('/subscribe/cancel', [PaymentController::class, 'cancelSubscription'])->name('subscribe.cancel');
    Route::get('/subscribe/{priceId}', [PaymentController::class, 'subscribe'])->name('subscribe');
    Route::get('/lesson/{slug}', [LessonController::class, 'sendTopic'])->name('send.topic');
});

Route::get('/terms_2', function () {
    return view('pages.terms_2');
})->name('terms_2'); 

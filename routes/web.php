<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditorController;

use App\Http\Controllers\TwoFactorController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Register web routes for the application.
| These routes are loaded by RouteServiceProvider within the "web" middleware group.
*/

// -----------------------------
// Public Routes - Articles & Pages
// -----------------------------
Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('articles.index');
    // Route::get('/articles', 'index')->name('articles.index');
    // Route::get('/detail/{id}', 'detail')->name('articles.detail');
    Route::get('/about-us', 'about')->name('articles.about');
    Route::get('/services', 'service')->name('articles.service');
    Route::get('/our-teams', 'ourteams')->name('articles.ourteams');
    Route::get('/insights', 'insights')->name('articles.insights');
    Route::get('/insights/{id}', 'insightDetail')->name('articles.insight_detail');
    Route::get('/contact-us', 'contact_us')->name('articles.contact_us');
    Route::get('/wcl', 'wcl')->name('articles.wcl');

    // Authenticated routes for article management
    Route::middleware(['auth'])->group(function () {
        Route::get('/articles/add', [ArticleController::class, 'add'])->name('articles.add');
        Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
        Route::delete('/articles/{id}', 'delete')->name('articles.delete');
        Route::get('/articles/edit/{id}', 'edit')->name('articles.edit');
        Route::post('/articles/update/{id}', 'update')->name('articles.update');
    });
});

// -----------------------------
// Public Routes - Careers
// -----------------------------
Route::prefix('career')->name('career.')->controller(JobPostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/detail/{id}', 'detail')->name('detail');
});

// -----------------------------
// Admin Panel Routes (requires authentication)
// -----------------------------
Route::prefix('admin')->name('admin.')->middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/users', 'users')->name('users');
    Route::get('/users/edit/{id}', 'editUser')->name('users.edit');
    Route::post('/users/update/{id}', 'updateUser')->name('users.update');
    Route::delete('/users/{id}', 'deleteUser')->name('users.delete');
    // Admin routes for blogs and careers
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/careers', 'careers')->name('careers');
    Route::get('/careers/add', 'addCareer')->name('careers.add');
    Route::post('/careers/store', 'storeCareer')->name('careers.store');
    Route::get('/careers/edit/{id}', 'editCareer')->name('careers.edit');
    Route::post('/careers/update/{id}', 'updateCareer')->name('careers.update');
    Route::delete('/careers/{id}', 'deleteCareer')->name('careers.delete');

    Route::get('/categories', 'categories')->name('categories');
    Route::get('/categories/add', 'addCategory')->name('categories.add');
    Route::post('/categories/store', 'storeCategory')->name('categories.store');
    Route::get('/categories/edit/{id}', 'editCategory')->name('categories.edit');
    Route::post('/categories/update/{id}', 'updateCategory')->name('categories.update');
    Route::delete('/categories/{id}', 'deleteCategory')->name('categories.delete');
    // Consider adding more specific middleware for admin roles if needed
});

// -----------------------------
// Authentication Routes
// -----------------------------
Auth::routes([
    'register' => false,
    'reset' => false,   // ✅ correct key is 'reset', not 'password.reset'
    'verify' => false   // optional
]);

// -----------------------------
// Home and Profile Routes (after login)
// -----------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::post('/ckeditor/upload', [EditorController::class, 'upload'])->name('ckeditor.upload');

// routes/web.php


Route::middleware(['auth'])->group(function () {
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup');
    Route::post('/2fa/setup', [TwoFactorController::class, 'enable2fa'])->name('2fa.enable');
    Route::get('/2fa/verify', [TwoFactorController::class, 'showVerifyForm'])->name('2fa.verify');
    Route::post('/2fa/verify', [TwoFactorController::class, 'verifyCode'])->name('2fa.verify.post');
});


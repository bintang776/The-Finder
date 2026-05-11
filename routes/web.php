<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CampusController as AdminCampusController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserPropertyController;

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Properties
Route::get('/hunian', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/hunian/{property}', [PropertyController::class, 'show'])->name('properties.show');

// Categories
Route::get('/kategori/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Campuses
Route::get('/area-kampus', [CampusController::class, 'index'])->name('campuses.index');
Route::get('/area-kampus/{campus}', [CampusController::class, 'show'])->name('campuses.show');

// Articles
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article}', [ArticleController::class, 'show'])->name('articles.show');

// About & Contact
Route::get('/tentang-kami', [ContactController::class, 'create'])->name('about');
Route::post('/tentang-kami/kontak', [ContactController::class, 'store'])->name('contacts.store');

// ==========================================
// AUTH ROUTES
// ==========================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================================
// USER ROUTES
// ==========================================
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/properties', [UserPropertyController::class, 'index'])->name('properties.index');
    Route::get('/properties/create', [UserPropertyController::class, 'create'])->name('properties.create');
    Route::post('/properties', [UserPropertyController::class, 'store'])->name('properties.store');
});

// ==========================================
// ADMIN ROUTES
// ==========================================
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', AdminCategoryController::class);
    Route::resource('campuses', AdminCampusController::class);
    Route::resource('facilities', AdminFacilityController::class);
    Route::resource('properties', AdminPropertyController::class);
    Route::patch('/properties/{property}/verify', [AdminPropertyController::class, 'verify'])->name('properties.verify');
    Route::resource('articles', AdminArticleController::class);

    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{contact}/read', [AdminContactController::class, 'markAsRead'])->name('contacts.markAsRead');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

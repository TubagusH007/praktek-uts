<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes — Go-Blog
|--------------------------------------------------------------------------
*/

// ── Halaman Publik (Pengunjung) ──────────────────────────────────────────
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Komentar pengunjung
Route::post('/blog/{post}/comments', [CommentController::class, 'store'])->name('comments.store');


// ── Halaman Tambahan (Dari branch kamu) ──────────────────────────────────
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');


// ── Autentikasi ──────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {

    // Halaman pilihan role
    Route::get('/login', [AuthController::class, 'showRoleSelect'])->name('login');

    // Login Admin
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('login.admin');
    Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('login.admin.submit');

    // Login Visitor
    Route::get('/visitor/login', [AuthController::class, 'showVisitorLogin'])->name('login.visitor');
    Route::post('/visitor/login', [AuthController::class, 'loginVisitor'])->name('login.visitor.submit');

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ── Admin Dashboard ──────────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Post Management
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Comment Management
    Route::get('/comments', [CommentController::class, 'adminIndex'])->name('comments.index');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
});
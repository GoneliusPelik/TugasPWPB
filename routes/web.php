<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontEndController;

/*
|--------------------------------------------------------------------------
| JALUR PUBLIK (FRONT-END)
|--------------------------------------------------------------------------
| Jalur ini bisa diakses oleh siapa saja tanpa perlu login.
*/

// Halaman katalog acara (Landing Page)
Route::get('/', [FrontEndController::class, 'index']);

/*
|--------------------------------------------------------------------------
| JALUR AUTENTIKASI
|--------------------------------------------------------------------------
| Untuk Login, Register, dan Logout.
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| JALUR ADMINISTRASI (BACK-END / DASHBOARD)
|--------------------------------------------------------------------------
| Dilindungi oleh Middleware Auth — hanya bisa diakses oleh pengguna Login.
| Tamu yang paksa akses URL ini akan otomatis diarahkan ke halaman Login.
*/

Route::middleware('auth')->group(function () {

    // [1] Halaman Utama Dashboard (Panel Admin)
    Route::get('/dashboard', [CategoryController::class, 'index']);

    // [2] Manajemen Kategori
    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/store', [CategoryController::class, 'store']);
    Route::get('/kategori/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/kategori/{category}', [CategoryController::class, 'update']);
    Route::delete('/kategori/{category}', [CategoryController::class, 'destroy']);

    // [3] Manajemen Acara — rute /event/create HARUS didaftarkan sebelum /event/{id}
    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event/store', [EventController::class, 'store']);
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/event/{event}/edit', [EventController::class, 'edit']);
    Route::put('/event/{event}', [EventController::class, 'update']);
    Route::delete('/event/{event}', [EventController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| JALUR DETAIL ACARA (PUBLIK)
|--------------------------------------------------------------------------
| Didefinisikan SETELAH rute /event/create agar tidak bentrok dengan {id}.
*/

Route::get('/event/{id}', [FrontEndController::class, 'show'])->name('event.show');

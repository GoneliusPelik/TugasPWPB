<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontEndController; // <-- [BARU] Import Resepsionis Halaman Depan

/*
|--------------------------------------------------------------------------
| JALUR PUBLIK (FRONT-END)
|--------------------------------------------------------------------------
| Jalur ini bisa diakses oleh siapa saja tanpa perlu login.
| Ibarat pintu gerbang utama sekolah yang terbuka untuk tamu.
*/

// Jalur Utama: Mengarahkan pengunjung ke halaman katalog acara (Landing Page)
Route::get('/', [FrontEndController::class, 'index']);

/*
|--------------------------------------------------------------------------
| JALUR ADMINISTRASI (BACK-END / DASHBOARD)
|--------------------------------------------------------------------------
| Jalur ini digunakan oleh Panitia/Admin untuk mengelola data (CRUD).
| Ibarat ruang kantor atau gudang yang hanya boleh dimasuki petugas.
*/

// [1] Halaman Utama Dashboard (Panel Admin)
Route::get('/dashboard', [CategoryController::class, 'index']);

Route::get('/dashboard/category/create', [CategoryController::class, 'create']);

Route::post('/dashboard/category/store', [CategoryController::class, 'store']);

// Jalur untuk membuka Halaman Form Edit
Route::get('/kategori/{category}/edit', [CategoryController::class, 'edit']);
// Jalur untuk memproses penyimpanan data yang di-edit (Perhatikan method PUT)
Route::put('/kategori/{category}', [CategoryController::class, 'update']);
// Jalur untuk memproses penghapusan data (Perhatikan method DELETE)
Route::delete('/kategori/{category}', [CategoryController::class, 'destroy']);

Route::get('/event/create', [EventController::class, 'create']);
Route::post('/event/store', [EventController::class, 'store']);
Route::get('/events', [EventController::class, 'index']);

// newest pertemuan 9

Route::get('/event/{event}/edit', [EventController::class, 'edit']); 
Route::put('/event/{event}', [EventController::class, 'update']); 
Route::delete('/event/{event}', [EventController::class, 'destroy']); 
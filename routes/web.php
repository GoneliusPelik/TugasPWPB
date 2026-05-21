<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // <-- [1] Kenalkan Pos Satpam dengan Manajer
use App\Http\Controllers\EventController;

Route::get('/', function () {
 return view('home');
});
// [2] Jika ada yang akses URL /dashboard, arahkan ke EventController bagian index
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
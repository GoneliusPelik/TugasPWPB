<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // <-- [1] Kenalkan Pos Satpam dengan Manajer
Route::get('/', function () {
 return view('home');
});
// [2] Jika ada yang akses URL /dashboard, arahkan ke EventController bagian index
Route::get('/dashboard', [CategoryController::class, 'index']); 
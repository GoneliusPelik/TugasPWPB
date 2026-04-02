<?php
namespace App\Http\Controllers;
use App\Models\Category; // <-- [1] Panggil Kepala Gudang
class CategoryController extends Controller
{
 // [2] Buat ruangan/method bernama index
 public function index()
 {
 // [3] Manajer meminta semua data dari Gudang
 $categories = Category::all();
 // [4] Manajer mengirim paket data ke halaman Dashboard
 return view('dashboard', compact('categories'));
 }
 }
<?php
namespace App\Http\Controllers;
use App\Models\Category; // <-- [1] Panggil Kepala Gudang
use Illuminate\Http\Request;

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
 public function create()
 {
 return view('category_create'); // Mengarahkan ke file view form
 }
 public function store(Request $request)
 {
 // 1. Tahap Pemeriksaan (Validasi)
 $request->validate([
 'name' => 'required|min:3|unique:categories,name',
 'slug' => 'required|unique:categories,slug'
 ]);
 // 2. Tahap Eksekusi Simpan (Eloquent)
 \App\Models\Category::create([
 'name' => $request->name,
 'slug' => $request->slug
 ]);
 // 3. Tahap Feedback (Redirect)
 return redirect('/dashboard')->with('success', 'Kategori Berhasil Disimpan!');
 }
 }
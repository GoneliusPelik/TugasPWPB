<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event; // Wajib dipanggil untuk Select Dropdown
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->latest()->get(); // Ambil data Event beserta relasi Category

        return view('event_index', compact('events'));
    }

    public function create()
    {
        // Ambil semua daftar kategori dari database
        $categories = Category::all();

        // Lempar ke halaman form agar bisa dijadikan pilihan Dropdown
        return view('event_create', compact('categories'));
    }

    // Fungsi Store (Simpan Data) sama persis dengan konsep Pertemuan 5
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'event_date' => 'required',
            'location' => 'required',
            'quota' => 'required',
            'description' => 'required',
        ]);

        $data = $request->except('poster');

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Event::create($data);

        return redirect('/dashboard')->with('success', 'Acara Baru Berhasil Ditambahkan!');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();

        return view('event_edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'event_date' => 'required',
            'location' => 'required',
            'quota' => 'required',
            'description' => 'required',
        ]);

        $data = $request->except('poster');

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $event->update($data);

        return redirect('/dashboard')->with('success', 'Data Acara Berhasil Diperbarui!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect('/dashboard')->with('success', 'Acara Berhasil Dihapus!');
    }

}

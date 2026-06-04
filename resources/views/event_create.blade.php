@extends('layouts.app')
@section('title', 'Tambah Acara')

@section('content')

    <div class="max-w-3xl mx-auto mb-8">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm shadow-gray-200/50 border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Formulir Tambah Acara Baru</h1>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-6 sm:p-8">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-9 h-9 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-red-800 mb-1">Terdapat kesalahan pada formulir:</p>
                                <ul class="list-disc list-inside text-sm text-red-600 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Form --}}
                <form action="/event/store" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    {{-- Category Select --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Pilih Kategori Acara</label>
                        <select name="category_id" required
                                class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border">
                            <option value="">-- Silakan Pilih --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Judul Acara</label>
                        <input type="text" name="title" placeholder="Contoh: Pensi Akhir Tahun" required
                               class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border">
                    </div>

                    {{-- Date & Location Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal Acara</label>
                            <input type="date" name="event_date" required
                                   class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Lokasi Acara</label>
                            <input type="text" name="location" placeholder="Contoh: Lapangan Utama" required
                                   class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border">
                        </div>
                    </div>

                    {{-- Quota --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kuota Peserta</label>
                        <input type="number" name="quota" placeholder="Contoh: 100" required
                               class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border">
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi Acara</label>
                        <textarea name="description" rows="4" placeholder="Tuliskan detail acara di sini..." required
                                  class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 focus:border-primary-400 focus:ring-4 focus:ring-primary-100 transition-all duration-200 outline-none border resize-y"></textarea>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-100"></div>

                    {{-- Poster Upload --}}
                    <div x-data="{ imageUrl: null }">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Poster Acara (Maks. 2MB)</label>

                        {{-- Image Preview --}}
                        <div x-show="imageUrl" x-cloak class="mb-3">
                            <img :src="imageUrl"
                                 class="rounded-xl shadow-md border border-gray-200 object-cover"
                                 style="max-height: 250px;">
                        </div>

                        {{-- File Input --}}
                        <div class="relative">
                            <input type="file" id="poster" name="poster" accept="image/*"
                                   @change="
                                       const file = $event.target.files[0];
                                       if (file) {
                                           const reader = new FileReader();
                                           reader.onload = (e) => { imageUrl = e.target.result; };
                                           reader.readAsDataURL(file);
                                       } else {
                                           imageUrl = null;
                                       }
                                   "
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 file:cursor-pointer file:transition-colors cursor-pointer border border-gray-200 rounded-xl bg-gray-50/50">
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 shadow-md shadow-primary-200 hover:shadow-lg hover:shadow-primary-300 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Data Acara
                        </button>
                        <a href="/events"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-gray-600 bg-white border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all duration-200">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

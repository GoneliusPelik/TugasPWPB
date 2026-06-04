@extends('layouts.app')
@section('title', 'Tambah Acara')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary-800 to-primary-900 px-4 sm:px-6 lg:px-8 py-8">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="relative max-w-4xl mx-auto">
            <div class="flex items-center gap-2 mb-2">
                <a href="/events" class="text-primary-400 text-[11px] font-bold uppercase tracking-widest hover:text-primary-300 transition-colors">Kelola Acara</a>
                <span class="text-primary-600">—</span>
                <span class="text-primary-500 text-[11px] font-bold uppercase tracking-widest">Tambah Baru</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Formulir Tambah Acara</h1>
            <p class="text-primary-300 text-sm mt-1">Isi semua informasi acara di bawah ini.</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Errors --}}
        @if ($errors->any())
        <div class="mb-6 flex items-start gap-3 p-4 rounded-2xl bg-red-50 border border-red-200">
            <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-red-700 mb-1.5">Terdapat kesalahan pada formulir:</p>
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                    <li class="flex items-center gap-1.5 text-sm text-red-500">
                        <span class="w-1 h-1 rounded-full bg-red-400 shrink-0"></span>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="/event/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ======== LEFT COLUMN: Main fields ======== --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Info card --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                            <div class="w-7 h-7 rounded-lg bg-primary-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <h2 class="text-sm font-bold text-gray-800">Informasi Acara</h2>
                        </div>
                        <div class="p-6 space-y-5">

                            {{-- Category --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Acara <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    </div>
                                    <select name="category_id" required
                                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200 appearance-none">
                                        <option value="">— Pilih kategori —</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Title --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Acara <span class="text-red-400">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                       placeholder="Contoh: Pensi Akhir Tahun 2026" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                            </div>

                            {{-- Date & Location --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Acara <span class="text-red-400">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="date" name="event_date" value="{{ old('event_date') }}" required
                                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi Acara <span class="text-red-400">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <input type="text" name="location" value="{{ old('location') }}"
                                               placeholder="Contoh: Lapangan Utama" required
                                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                                    </div>
                                </div>
                            </div>

                            {{-- Quota --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kuota Peserta <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="number" name="quota" value="{{ old('quota') }}"
                                           placeholder="Contoh: 100" min="1" required
                                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Acara <span class="text-red-400">*</span></label>
                                <textarea name="description" rows="5"
                                          placeholder="Tuliskan deskripsi lengkap acara di sini..." required
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200 resize-y leading-relaxed">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======== RIGHT COLUMN: Poster + Actions ======== --}}
                <div class="space-y-5">

                    {{-- Poster Upload --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" x-data="{ previewUrl: null }">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-50">
                            <div class="w-7 h-7 rounded-lg bg-primary-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h2 class="text-sm font-bold text-gray-800">Poster Acara</h2>
                        </div>
                        <div class="p-5">
                            {{-- Preview --}}
                            <div x-show="previewUrl" x-cloak class="mb-4">
                                <img :src="previewUrl" class="w-full rounded-xl border border-gray-100 object-cover shadow-sm" style="max-height:200px;">
                            </div>
                            <div x-show="!previewUrl" class="mb-4 h-32 rounded-xl border-2 border-dashed border-primary-200 bg-primary-50/50 flex flex-col items-center justify-center gap-2 text-primary-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <span class="text-xs font-semibold">Pilih gambar</span>
                            </div>
                            <input type="file" id="poster" name="poster" accept="image/*"
                                   @change="
                                       const f = $event.target.files[0];
                                       if(f){ const r = new FileReader(); r.onload=e=>previewUrl=e.target.result; r.readAsDataURL(f); }
                                       else { previewUrl = null; }
                                   "
                                   class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100 file:cursor-pointer file:transition-colors">
                            <p class="mt-2 text-[11px] text-gray-400">JPG, PNG, GIF — Maks. 2MB</p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 space-y-3">
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-primary-500 text-white text-sm font-bold hover:bg-primary-600 shadow-md shadow-primary-200 hover:shadow-lg hover:shadow-primary-300/60 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Acara
                        </button>
                        <a href="/events"
                           class="w-full inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-gray-50 text-gray-600 text-sm font-semibold hover:bg-gray-100 border border-gray-200 transition-all duration-200">
                            Batal
                        </a>
                    </div>

                    {{-- Tips --}}
                    <div class="bg-primary-50 rounded-2xl border border-primary-100 p-4">
                        <p class="text-xs font-bold text-primary-700 mb-2">Tips Pengisian:</p>
                        <ul class="space-y-1.5">
                            <li class="flex items-start gap-2 text-xs text-primary-600">
                                <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                                Judul harus jelas dan deskriptif
                            </li>
                            <li class="flex items-start gap-2 text-xs text-primary-600">
                                <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                                Pastikan tanggal sudah benar sebelum disimpan
                            </li>
                            <li class="flex items-start gap-2 text-xs text-primary-600">
                                <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                                Poster opsional namun sangat disarankan
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

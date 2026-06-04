@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary-800 to-primary-900 px-4 sm:px-6 lg:px-8 py-8">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="relative max-w-2xl mx-auto">
            <div class="flex items-center gap-2 mb-2">
                <a href="/dashboard" class="text-primary-400 text-[11px] font-bold uppercase tracking-widest hover:text-primary-300 transition-colors">Dashboard</a>
                <span class="text-primary-600">—</span>
                <span class="text-primary-500 text-[11px] font-bold uppercase tracking-widest">Tambah Kategori</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Formulir Tambah Kategori</h1>
            <p class="text-primary-300 text-sm mt-1">Buat kategori baru untuk pengelompokan acara.</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Card header --}}
            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                <div class="w-8 h-8 rounded-xl bg-primary-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <h2 class="text-sm font-bold text-gray-800">Detail Kategori</h2>
            </div>

            <div class="p-6 sm:p-8">
                <form action="/dashboard/category/store" method="POST" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nama Kategori <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Contoh: Olahraga, Seni, Akademik..."
                                   class="w-full pl-12 pr-4 py-3.5 rounded-xl border {{ $errors->has('name') ? 'border-red-300 bg-red-50/50 focus:ring-red-300 focus:border-red-400' : 'border-gray-200 bg-white focus:ring-primary-300 focus:border-primary-400' }} text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 transition-all duration-200">
                        </div>
                        @error('name')
                        <div class="mt-1.5 flex items-center gap-1.5 text-xs text-red-600">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            URL Slug <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400 text-sm font-mono">/</span>
                            </div>
                            <input type="text" name="slug" value="{{ old('slug') }}"
                                   placeholder="contoh: olahraga-sekolah"
                                   class="w-full pl-8 pr-4 py-3.5 rounded-xl border {{ $errors->has('slug') ? 'border-red-300 bg-red-50/50 focus:ring-red-300 focus:border-red-400' : 'border-gray-200 bg-white focus:ring-primary-300 focus:border-primary-400' }} text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 font-mono transition-all duration-200">
                        </div>
                        @error('slug')
                        <div class="mt-1.5 flex items-center gap-1.5 text-xs text-red-600">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $message }}
                        </div>
                        @else
                        <p class="mt-1.5 text-xs text-gray-400">Gunakan huruf kecil, angka, dan tanda hubung. Contoh: <code class="bg-gray-100 px-1 rounded text-gray-600">kegiatan-seni</code></p>
                        @enderror
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-50 pt-2"></div>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-primary-500 text-white text-sm font-bold hover:bg-primary-600 shadow-md shadow-primary-200 hover:shadow-lg hover:shadow-primary-300/60 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Kategori
                        </button>
                        <a href="/dashboard"
                           class="inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-gray-50 text-gray-600 text-sm font-semibold hover:bg-gray-100 border border-gray-200 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tips --}}
        <div class="mt-5 bg-primary-50 rounded-2xl border border-primary-100 p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-primary-100 flex items-center justify-center shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-primary-800 mb-1.5">Panduan Kategori</p>
                    <ul class="space-y-1">
                        <li class="flex items-start gap-2 text-xs text-primary-600">
                            <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                            Nama kategori harus unik dan deskriptif
                        </li>
                        <li class="flex items-start gap-2 text-xs text-primary-600">
                            <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                            Slug digunakan sebagai URL dan harus unik
                        </li>
                        <li class="flex items-start gap-2 text-xs text-primary-600">
                            <span class="w-1 h-1 rounded-full bg-primary-400 mt-1.5 shrink-0"></span>
                            Slug hanya boleh berisi huruf kecil, angka, dan tanda hubung (-)
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

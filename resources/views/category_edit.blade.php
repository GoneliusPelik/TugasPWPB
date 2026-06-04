@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-amber-700 to-amber-800 px-4 sm:px-6 lg:px-8 py-8">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="relative max-w-2xl mx-auto">
            <div class="flex items-center gap-2 mb-2">
                <a href="/dashboard" class="text-amber-300 text-[11px] font-bold uppercase tracking-widest hover:text-amber-200 transition-colors">Dashboard</a>
                <span class="text-amber-600">—</span>
                <span class="text-amber-400 text-[11px] font-bold uppercase tracking-widest">Edit Kategori</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Edit Kategori</h1>
            <p class="text-amber-200/70 text-sm mt-1">Memperbarui: <span class="font-semibold text-amber-100">{{ $category->name }}</span></p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Card header --}}
            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                <div class="w-8 h-8 rounded-xl bg-amber-50 flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <h2 class="text-sm font-bold text-gray-800">Detail Kategori</h2>
                <span class="ml-auto px-2.5 py-1 rounded-full bg-amber-50 text-amber-600 text-[11px] font-bold border border-amber-100">Mode Edit</span>
            </div>

            <div class="p-6 sm:p-8">
                <form action="/kategori/{{ $category->id }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Nama Kategori <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            </div>
                            <input type="text" name="name" value="{{ $category->name }}" required
                                   class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200">
                        </div>
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
                            <input type="text" name="slug" value="{{ $category->slug }}" required
                                   class="w-full pl-8 pr-4 py-3.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200 font-mono">
                        </div>
                        <p class="mt-1.5 text-xs text-gray-400">Slug saat ini: <code class="bg-gray-100 px-1.5 py-0.5 rounded text-gray-600 font-mono">{{ $category->slug }}</code></p>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-50 pt-2"></div>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-amber-500 text-white text-sm font-bold hover:bg-amber-600 shadow-md shadow-amber-200 hover:shadow-lg hover:shadow-amber-300/60 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </button>
                        <a href="/dashboard"
                           class="inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-gray-50 text-gray-600 text-sm font-semibold hover:bg-gray-100 border border-gray-200 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Warning info --}}
        <div class="mt-5 bg-amber-50 rounded-2xl border border-amber-100 p-5">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-amber-800 mb-1">Perhatian</p>
                    <ul class="space-y-1">
                        <li class="flex items-start gap-2 text-xs text-amber-700">
                            <span class="w-1 h-1 rounded-full bg-amber-500 mt-1.5 shrink-0"></span>
                            Mengubah slug dapat mempengaruhi link yang sudah dibagikan
                        </li>
                        <li class="flex items-start gap-2 text-xs text-amber-700">
                            <span class="w-1 h-1 rounded-full bg-amber-500 mt-1.5 shrink-0"></span>
                            Semua acara dalam kategori ini akan terpengaruh oleh perubahan nama
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

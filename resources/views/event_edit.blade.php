@extends('layouts.app')
@section('title', 'Edit Acara')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-amber-700 to-amber-800 px-4 sm:px-6 lg:px-8 py-8">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="relative max-w-4xl mx-auto">
            <div class="flex items-center gap-2 mb-2">
                <a href="/events" class="text-amber-300 text-[11px] font-bold uppercase tracking-widest hover:text-amber-200 transition-colors">Kelola Acara</a>
                <span class="text-amber-600">—</span>
                <span class="text-amber-400 text-[11px] font-bold uppercase tracking-widest">Edit</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-white">Edit Data Acara</h1>
            <p class="text-amber-200/70 text-sm mt-1">Perbarui informasi acara: <span class="font-semibold text-amber-100">{{ $event->title }}</span></p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <form action="/event/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ======== LEFT: Main fields ======== --}}
                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                            <div class="w-7 h-7 rounded-lg bg-amber-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
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
                                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200 appearance-none">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                <input type="text" name="title" value="{{ $event->title }}" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200">
                            </div>

                            {{-- Date, Location, Quota --}}
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal <span class="text-red-400">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <input type="date" name="event_date" value="{{ $event->event_date }}" required
                                               class="w-full pl-10 pr-3 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi <span class="text-red-400">*</span></label>
                                    <input type="text" name="location" value="{{ $event->location }}" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Kuota <span class="text-red-400">*</span></label>
                                    <input type="number" name="quota" value="{{ $event->quota }}" min="1" required
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi <span class="text-red-400">*</span></label>
                                <textarea name="description" rows="5" required
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all duration-200 resize-y leading-relaxed">{{ $event->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======== RIGHT: Poster + Actions ======== --}}
                <div class="space-y-5">

                    {{-- Poster --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" x-data="{ previewUrl: null }">
                        <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-50">
                            <div class="w-7 h-7 rounded-lg bg-amber-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h2 class="text-sm font-bold text-gray-800">Poster Acara</h2>
                        </div>
                        <div class="p-5">
                            {{-- Current or new preview --}}
                            <div class="mb-4">
                                @if($event->poster)
                                <img x-show="!previewUrl" src="/storage/{{ $event->poster }}"
                                     class="w-full rounded-xl border border-gray-100 object-cover shadow-sm" style="max-height:200px;">
                                @else
                                <div x-show="!previewUrl" class="h-32 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center gap-2 text-gray-300">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="text-xs">Belum ada poster</span>
                                </div>
                                @endif
                                <img x-show="previewUrl" x-cloak :src="previewUrl"
                                     class="w-full rounded-xl border border-gray-100 object-cover shadow-sm" style="max-height:200px;">
                            </div>
                            <input type="file" name="poster" accept="image/*"
                                   @change="
                                       const f = $event.target.files[0];
                                       if(f){ const r = new FileReader(); r.onload=e=>previewUrl=e.target.result; r.readAsDataURL(f); }
                                       else { previewUrl = null; }
                                   "
                                   class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-600 hover:file:bg-amber-100 file:cursor-pointer file:transition-colors">
                            <p class="mt-2 text-[11px] text-gray-400">Abaikan jika tidak ingin mengganti poster.</p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 space-y-3">
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-xl bg-amber-500 text-white text-sm font-bold hover:bg-amber-600 shadow-md shadow-amber-200 hover:shadow-lg hover:shadow-amber-300/60 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            Simpan Perubahan
                        </button>
                        <a href="/events"
                           class="w-full inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-gray-50 text-gray-600 text-sm font-semibold hover:bg-gray-100 border border-gray-200 transition-all duration-200">
                            Batal
                        </a>
                    </div>

                    {{-- Info box --}}
                    <div class="bg-amber-50 rounded-2xl border border-amber-100 p-4">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <p class="text-xs text-amber-700 leading-relaxed">Perubahan akan langsung tampil di halaman publik setelah disimpan.</p>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

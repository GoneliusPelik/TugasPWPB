@extends('layouts.app')
@section('title', $event->title)
@section('content')

{{-- ======== HERO BREADCRUMB ======== --}}
<div class="relative overflow-hidden bg-gradient-to-r from-primary-900 to-primary-800 px-4 sm:px-6 lg:px-8 py-10">
    <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
    <div class="absolute -right-20 -top-20 w-64 h-64 rounded-full bg-primary-600 opacity-20 blur-3xl"></div>
    <div class="relative max-w-7xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm mb-5">
            <a href="/" class="flex items-center gap-1.5 text-primary-400 hover:text-primary-300 font-semibold transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
            <svg class="w-4 h-4 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-primary-300 font-medium truncate max-w-xs">{{ $event->title }}</span>
        </nav>

        {{-- Category + Title --}}
        <div>
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary-700/60 border border-primary-600/40 text-primary-200 text-xs font-bold uppercase tracking-widest mb-3">
                {{ $event->category->name }}
            </span>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-tight max-w-3xl">
                {{ $event->title }}
            </h1>
        </div>
    </div>
</div>

{{-- ======== MAIN CONTENT ======== --}}
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- ======== LEFT: Poster ======== --}}
            <div class="lg:col-span-2">
                <div class="sticky top-24">
                    <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm">
                        @if($event->poster)
                            <img src="/storage/{{ $event->poster }}" alt="{{ $event->title }}" class="w-full h-auto">
                        @else
                            <div class="aspect-[3/4] bg-gradient-to-br from-primary-50 to-primary-100 flex flex-col items-center justify-center gap-3">
                                <div class="w-20 h-20 rounded-2xl bg-white/70 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <span class="text-sm font-semibold text-primary-300">Tanpa Poster</span>
                            </div>
                        @endif
                    </div>

                    {{-- Back button --}}
                    <div class="mt-4">
                        <a href="/" class="w-full inline-flex items-center justify-center gap-2 py-3 px-6 rounded-2xl bg-white text-gray-600 text-sm font-semibold hover:bg-gray-50 border border-gray-200 shadow-sm hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>

            {{-- ======== RIGHT: Details ======== --}}
            <div class="lg:col-span-3">

                {{-- Info cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                    {{-- Date --}}
                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="text-[10px] font-bold text-primary-500 uppercase tracking-widest mb-1">Tanggal</p>
                        <p class="text-sm font-black text-gray-800 leading-snug">{{ date('d M Y', strtotime($event->event_date)) }}</p>
                    </div>

                    {{-- Location --}}
                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <p class="text-[10px] font-bold text-primary-500 uppercase tracking-widest mb-1">Lokasi</p>
                        <p class="text-sm font-black text-gray-800 leading-snug">{{ $event->location }}</p>
                    </div>

                    {{-- Quota --}}
                    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <p class="text-[10px] font-bold text-primary-500 uppercase tracking-widest mb-1">Kuota</p>
                        <p class="text-sm font-black text-gray-800 leading-snug">{{ $event->quota }} Peserta</p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="flex items-center gap-4 mb-8">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-300"></span>
                        <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-primary-300"></span>
                    </div>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-50">
                        <div class="w-7 h-7 rounded-lg bg-primary-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h2 class="text-sm font-bold text-gray-800">Deskripsi Acara</h2>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $event->description }}</div>
                    </div>
                </div>

                {{-- Admin actions (only for authenticated) --}}
                @auth
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="/event/{{ $event->id }}/edit"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-50 text-amber-700 text-sm font-bold border border-amber-200 hover:bg-amber-100 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Acara
                    </a>
                    <form action="/event/{{ $event->id }}" method="POST" class="inline"
                          onsubmit="return confirm('Yakin ingin menghapus acara ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-50 text-red-600 text-sm font-bold border border-red-200 hover:bg-red-100 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Hapus Acara
                        </button>
                    </form>
                </div>
                @endauth
            </div>

        </div>
    </div>
</div>

@endsection

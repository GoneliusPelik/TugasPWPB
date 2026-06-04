@extends('layouts.app')

@section('title', $event->title)

@section('content')
<!-- Breadcrumb -->
<div class="bg-gradient-to-r from-primary-50 to-white border-b border-primary-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-500 truncate max-w-xs">{{ $event->title }}</span>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-14">

            <!-- Left Column - Poster -->
            <div class="lg:col-span-2">
                <div class="sticky top-8">
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                        @if ($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->title }}" class="w-full h-auto object-cover">
                        @else
                        <div class="w-full aspect-[3/4] bg-gradient-to-br from-primary-50 to-primary-100 flex flex-col items-center justify-center gap-3">
                            <div class="w-20 h-20 rounded-full bg-white/70 flex items-center justify-center">
                                <svg class="w-10 h-10 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-primary-400">Tanpa Poster</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Details -->
            <div class="lg:col-span-3">
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-primary-100 text-primary-700 border border-primary-200">
                        {{ $event->category->name }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight">{{ $event->title }}</h1>

                <!-- Info Cards Grid -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Date -->
                    <div class="bg-gradient-to-br from-primary-50 to-white rounded-xl p-5 border border-primary-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-9 h-9 rounded-lg bg-primary-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-primary-500 uppercase tracking-wider">Tanggal Pelaksanaan</p>
                        <p class="mt-1 text-sm font-bold text-gray-800">{{ date('d M Y', strtotime($event->event_date)) }}</p>
                    </div>

                    <!-- Location -->
                    <div class="bg-gradient-to-br from-primary-50 to-white rounded-xl p-5 border border-primary-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-9 h-9 rounded-lg bg-primary-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-primary-500 uppercase tracking-wider">Lokasi</p>
                        <p class="mt-1 text-sm font-bold text-gray-800">{{ $event->location }}</p>
                    </div>

                    <!-- Quota -->
                    <div class="bg-gradient-to-br from-primary-50 to-white rounded-xl p-5 border border-primary-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-9 h-9 rounded-lg bg-primary-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-primary-500 uppercase tracking-wider">Kuota Peserta</p>
                        <p class="mt-1 text-sm font-bold text-gray-800">{{ $event->quota }} Orang</p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="my-8 flex items-center gap-3">
                    <div class="flex-1 h-px bg-gradient-to-r from-primary-200 to-transparent"></div>
                    <div class="w-1.5 h-1.5 rounded-full bg-primary-300"></div>
                    <div class="flex-1 h-px bg-gradient-to-l from-primary-200 to-transparent"></div>
                </div>

                <!-- Description -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Deskripsi Acara
                    </h2>
                    <div class="mt-4 text-gray-600 leading-relaxed whitespace-pre-line bg-gray-50/50 rounded-xl p-6 border border-gray-100">{{ $event->description }}</div>
                </div>

                <!-- Back Button -->
                <div class="mt-10">
                    <a href="/" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary-500 text-white font-semibold hover:bg-primary-600 active:bg-primary-700 transition-all duration-200 shadow-lg shadow-primary-500/25 hover:shadow-xl hover:shadow-primary-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-primary-100 via-primary-50 to-white">
    <!-- Animated Background Blobs -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
    <div class="absolute top-0 right-0 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 lg:py-40 text-center">
        <!-- Floating Badge -->
        <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-primary-200 rounded-full px-5 py-2 mb-8 shadow-sm animate-fade-in-up">
            <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
            <span class="text-sm font-medium text-primary-700">Platform Informasi Sekolah</span>
        </div>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
            Selamat Datang di
            <span class="block mt-2 bg-gradient-to-r from-primary-600 to-primary-400 bg-clip-text text-transparent">SchoolEvent</span>
        </h1>

        <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-gray-500 leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
            Papan Informasi Acara dan Kegiatan Resmi Sekolah
        </p>

        <!-- Decorative Dots -->
        <div class="flex justify-center gap-1.5 mt-10 animate-fade-in-up" style="animation-delay: 0.3s;">
            <span class="w-1.5 h-1.5 rounded-full bg-primary-300"></span>
            <span class="w-1.5 h-1.5 rounded-full bg-primary-400"></span>
            <span class="w-1.5 h-1.5 rounded-full bg-primary-500"></span>
            <span class="w-1.5 h-1.5 rounded-full bg-primary-400"></span>
            <span class="w-1.5 h-1.5 rounded-full bg-primary-300"></span>
        </div>
    </div>

    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
            <path d="M0 60L48 55C96 50 192 40 288 35C384 30 480 30 576 33.3C672 36.7 768 43.3 864 45C960 46.7 1056 43.3 1152 38.3C1248 33.3 1344 26.7 1392 23.3L1440 20V60H1392C1344 60 1248 60 1152 60C1056 60 960 60 864 60C768 60 672 60 576 60C480 60 384 60 288 60C192 60 96 60 48 60H0Z" fill="white"/>
        </svg>
    </div>
</div>

<!-- Event Catalog Section -->
<div class="bg-white py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Katalog Acara Terbaru</h2>
            <div class="mt-4 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-primary-300"></span>
                <span class="w-2 h-2 rounded-full bg-primary-500"></span>
                <span class="h-px w-12 bg-primary-300"></span>
            </div>
            <p class="mt-4 text-gray-500 max-w-xl mx-auto">Temukan berbagai acara dan kegiatan menarik yang diselenggarakan oleh sekolah.</p>
        </div>

        <!-- Event Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($events as $event)
            <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                <!-- Poster -->
                <div class="relative overflow-hidden">
                    @if($event->poster)
                    <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->title }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-52 bg-gradient-to-br from-primary-50 to-primary-100 flex flex-col items-center justify-center gap-2">
                        <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm font-medium text-primary-400">Tanpa Poster</span>
                    </div>
                    @endif
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur-sm text-primary-700 shadow-sm border border-primary-100">
                            {{ $event->category->name }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 sm:p-6">
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary-600 transition-colors duration-200 line-clamp-2">
                        {{ $event->title }}
                    </h3>

                    <div class="mt-3 flex flex-col gap-2">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>

                    <p class="mt-4 text-sm text-gray-400 leading-relaxed line-clamp-3">{{ $event->description }}</p>

                    <div class="mt-5 pt-5 border-t border-gray-50">
                        <a href="/event/{{ $event->id }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-600 hover:text-primary-700 group/btn transition-colors duration-200">
                            Lihat Detail Acara
                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-20 px-6">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-primary-50 mb-6">
                        <svg class="w-10 h-10 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700">Belum ada acara</h3>
                    <p class="mt-2 text-gray-400">Belum ada acara yang dipublikasikan.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-blob { animation: blob 8s infinite ease-in-out; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    .animate-fade-in-up { animation: fade-in-up 0.6s ease-out forwards; opacity: 0; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
</style>
@endsection

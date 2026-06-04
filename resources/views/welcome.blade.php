@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- ======== HERO SECTION ======== --}}
<section class="relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700 min-h-[92vh] flex items-center">

    {{-- Dot grid background --}}
    <div class="absolute inset-0 dot-grid opacity-[0.12]"></div>

    {{-- Decorative blobs --}}
    <div class="absolute -top-40 -right-40 w-[500px] h-[500px] rounded-full bg-primary-500 opacity-20 blur-3xl"></div>
    <div class="absolute -bottom-60 -left-20 w-[400px] h-[400px] rounded-full bg-primary-400 opacity-15 blur-3xl"></div>

    {{-- Large decorative circle rings --}}
    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/3">
        <div class="w-[600px] h-[600px] rounded-full border border-primary-600/40"></div>
        <div class="absolute inset-10 rounded-full border border-primary-500/30"></div>
        <div class="absolute inset-24 rounded-full border border-primary-400/20"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text content --}}
            <div>
                {{-- Tag --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-700/60 border border-primary-600/40 backdrop-blur-sm mb-8 anim-up">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary-300 animate-pulse"></span>
                    <span class="text-primary-200 text-xs font-bold uppercase tracking-widest">Platform Informasi Sekolah</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-[3.5rem] sm:text-[4.5rem] lg:text-[5.5rem] font-black text-white leading-none tracking-tight anim-up delay-100">
                    School<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-200 to-primary-400">Event</span>
                </h1>

                <p class="mt-6 text-lg text-primary-100/80 leading-relaxed max-w-md anim-up delay-200">
                    Papan informasi acara dan kegiatan resmi <strong class="text-white font-semibold">SMK Plus Pelita Nusantara</strong>. Temukan semua acara dalam satu tempat.
                </p>

                {{-- CTA --}}
                <div class="mt-10 flex flex-wrap gap-4 anim-up delay-300">
                    <a href="#events" class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl bg-white text-primary-700 font-bold text-sm hover:bg-primary-50 shadow-xl shadow-primary-900/30 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-2xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Lihat Semua Acara
                    </a>
                    @guest
                    <a href="/register" class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl bg-primary-600/40 border border-primary-500/50 text-white font-bold text-sm hover:bg-primary-600/60 backdrop-blur-sm transition-all duration-200">
                        Daftar Gratis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    @endguest
                </div>

                {{-- Stats --}}
                <div class="mt-14 flex items-center gap-8 anim-up delay-400">
                    <div>
                        <p class="text-4xl font-black text-white">{{ $events->count() }}</p>
                        <p class="text-xs text-primary-300 mt-0.5 font-semibold uppercase tracking-wide">Acara Aktif</p>
                    </div>
                    <div class="w-px h-10 bg-primary-600"></div>
                    <div>
                        <p class="text-4xl font-black text-white">2026</p>
                        <p class="text-xs text-primary-300 mt-0.5 font-semibold uppercase tracking-wide">Tahun Berjalan</p>
                    </div>
                    <div class="w-px h-10 bg-primary-600"></div>
                    <div>
                        <p class="text-4xl font-black text-white">SMK<span class="text-primary-300">+</span></p>
                        <p class="text-xs text-primary-300 mt-0.5 font-semibold uppercase tracking-wide">Pelita Nusantara</p>
                    </div>
                </div>
            </div>

            {{-- Right: Floating feature cards --}}
            <div class="hidden lg:flex items-center justify-center relative h-[460px]">

                {{-- Center logo circle --}}
                <div class="absolute w-32 h-32 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center z-10">
                    <div class="w-20 h-20 rounded-2xl bg-primary-500 flex items-center justify-center shadow-xl shadow-primary-900/50">
                        <span class="text-white font-black text-3xl select-none">S</span>
                    </div>
                </div>

                {{-- Floating cards --}}
                <div class="absolute top-[30px] left-[100px] anim-float">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 text-center w-28">
                        <svg class="w-8 h-8 text-primary-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-xs text-white font-bold">Jadwal</p>
                        <p class="text-[10px] text-primary-300 mt-0.5">Real-time</p>
                    </div>
                </div>

                <div class="absolute top-[30px] right-[80px] anim-float-slow" style="animation-delay:1.5s">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 text-center w-28">
                        <svg class="w-8 h-8 text-primary-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <p class="text-xs text-white font-bold">Kategori</p>
                        <p class="text-[10px] text-primary-300 mt-0.5">Terorganisir</p>
                    </div>
                </div>

                <div class="absolute bottom-[40px] left-[60px] anim-float-fast" style="animation-delay:.8s">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 text-center w-28">
                        <svg class="w-8 h-8 text-primary-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <p class="text-xs text-white font-bold">Lokasi</p>
                        <p class="text-[10px] text-primary-300 mt-0.5">Informatif</p>
                    </div>
                </div>

                <div class="absolute bottom-[40px] right-[100px] anim-float" style="animation-delay:2s">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 text-center w-28">
                        <svg class="w-8 h-8 text-primary-200 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <p class="text-xs text-white font-bold">Peserta</p>
                        <p class="text-[10px] text-primary-300 mt-0.5">Terbuka</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Diagonal wave bottom --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 90" fill="none" class="w-full" preserveAspectRatio="none">
            <path d="M0 90L360 60L720 75L1080 45L1440 65V90H0Z" fill="white" opacity="0.05"/>
            <path d="M0 90L480 55L960 70L1440 40V90H0Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- ======== EVENTS CATALOG ======== --}}
<section id="events" class="bg-white pt-4 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section header --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-4 pt-12">
            <div>
                <span class="inline-block text-primary-500 text-xs font-bold uppercase tracking-[.2em] mb-2">— Katalog</span>
                <h2 class="text-4xl sm:text-5xl font-black text-gray-900 leading-none">
                    Acara<br>Terbaru<span class="text-primary-500">.</span>
                </h2>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-400">
                <span class="w-8 h-[1.5px] bg-primary-200"></span>
                <span class="w-2 h-2 rounded-full bg-primary-400"></span>
                <span class="font-medium">{{ $events->count() }} acara tersedia</span>
            </div>
        </div>

        {{-- Event grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($events as $event)
            <article class="group relative bg-white rounded-[1.5rem] border border-gray-100 hover:border-primary-200 shadow-sm hover:shadow-2xl hover:shadow-primary-100/60 transition-all duration-400 overflow-hidden hover:-translate-y-1.5">

                {{-- Top accent bar --}}
                <div class="h-[3px] bg-gradient-to-r from-primary-400 to-primary-600 w-0 group-hover:w-full transition-all duration-500"></div>

                {{-- Number badge --}}
                <div class="absolute top-4 right-4 z-10 w-9 h-9 rounded-xl bg-white/90 backdrop-blur-sm border border-gray-100 flex items-center justify-center shadow-sm">
                    <span class="text-[11px] font-black text-primary-500">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>

                {{-- Poster --}}
                <div class="overflow-hidden h-[200px] bg-gradient-to-br from-primary-50 to-primary-100">
                    @if($event->poster)
                        <img src="/storage/{{ $event->poster }}" alt="{{ $event->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                            <svg class="w-14 h-14 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-xs text-primary-300 font-semibold">Tanpa Poster</span>
                        </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full bg-primary-50 text-primary-600 text-[11px] font-bold border border-primary-100 mb-3 uppercase tracking-wide">
                        {{ $event->category->name }}
                    </span>

                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary-700 transition-colors duration-200 line-clamp-2 leading-snug mb-3">
                        {{ $event->title }}
                    </h3>

                    <div class="flex flex-col gap-1.5 text-sm text-gray-500 mb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="truncate">{{ $event->location }}</span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-400 line-clamp-2 leading-relaxed mb-5">{{ $event->description }}</p>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                        <a href="/event/{{ $event->id }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-primary-600 hover:text-primary-800 transition-colors duration-200 group/link">
                            Lihat Detail
                            <svg class="w-4 h-4 group-hover/link:translate-x-1.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-gray-50 text-gray-400 text-[11px] font-semibold">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $event->quota }}
                        </span>
                    </div>
                </div>
            </article>

            @empty
            <div class="col-span-full py-28 flex flex-col items-center">
                <div class="relative w-28 h-28 mb-8">
                    <div class="absolute inset-0 rounded-3xl bg-primary-50 border-2 border-dashed border-primary-200"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-14 h-14 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                </div>
                <h3 class="text-2xl font-black text-gray-700">Belum Ada Acara</h3>
                <p class="mt-2 text-gray-400 text-sm">Nantikan informasi acara terbaru dari kami.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ======== CTA SECTION ======== --}}
<section class="relative overflow-hidden bg-gradient-to-r from-primary-600 to-primary-800 py-20">
    <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
    <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
            Ingin mengelola<br>acara sekolah?
        </h2>
        <p class="mt-4 text-primary-200 text-base leading-relaxed">Daftar sekarang dan mulai kelola semua kegiatan sekolah dalam satu platform.</p>
        @guest
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="/register" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-white text-primary-700 font-bold text-sm hover:bg-primary-50 shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                Daftar Sekarang — Gratis
            </a>
            <a href="/login" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-primary-700/50 border border-primary-500/50 text-white font-bold text-sm hover:bg-primary-700/70 transition-all duration-200">
                Masuk
            </a>
        </div>
        @else
        <div class="mt-8">
            <a href="/dashboard" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-white text-primary-700 font-bold text-sm hover:bg-primary-50 shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                Buka Panel Admin
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        @endguest
    </div>
</section>

@endsection

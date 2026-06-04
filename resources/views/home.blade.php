@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

<div class="relative min-h-[88vh] overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700 flex items-center">

    {{-- Background --}}
    <div class="absolute inset-0 dot-grid opacity-[0.12]"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-primary-500 opacity-20 blur-3xl"></div>
    <div class="absolute -bottom-48 -left-16 w-[450px] h-[450px] rounded-full bg-primary-400 opacity-15 blur-3xl"></div>

    {{-- Ring decorations --}}
    <div class="absolute right-[-80px] top-1/2 -translate-y-1/2">
        <div class="w-[500px] h-[500px] rounded-full border border-primary-600/30"></div>
        <div class="absolute inset-16 rounded-full border border-primary-500/20"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-24 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">

            {{-- Left: Welcome content --}}
            <div class="lg:col-span-3">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-700/60 border border-primary-600/40 backdrop-blur-sm mb-8 anim-up">
                    <svg class="w-4 h-4 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="text-primary-200 text-xs font-bold uppercase tracking-widest">Login sebagai Administrator</span>
                </div>

                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white leading-none tracking-tight anim-up delay-100">
                    Selamat<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-200 to-primary-400">Datang!</span>
                </h1>

                <p class="mt-6 text-lg text-primary-100/80 leading-relaxed max-w-lg anim-up delay-200">
                    Sistem pengelolaan acara dan kegiatan resmi <strong class="text-white font-semibold">SMK Plus Pelita Nusantara</strong>. Anda dapat menambah, mengedit, dan menghapus acara dari sini.
                </p>

                {{-- CTA Buttons --}}
                <div class="mt-10 flex flex-wrap gap-4 anim-up delay-300">
                    <a href="/dashboard" class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl bg-white text-primary-700 font-bold text-sm hover:bg-primary-50 shadow-xl shadow-primary-900/30 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        Buka Panel Admin
                    </a>
                    <a href="/event/create" class="inline-flex items-center gap-2.5 px-7 py-4 rounded-2xl bg-primary-600/40 border border-primary-500/50 text-white font-bold text-sm hover:bg-primary-600/60 backdrop-blur-sm transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Acara
                    </a>
                </div>
            </div>

            {{-- Right: Quick actions --}}
            <div class="lg:col-span-2 grid grid-cols-2 gap-4 anim-up delay-400">
                <a href="/dashboard" class="group bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 hover:bg-white/20 transition-all duration-200 hover:-translate-y-1">
                    <div class="w-10 h-10 rounded-xl bg-primary-500/50 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                    <p class="text-white font-bold text-sm">Kategori</p>
                    <p class="text-primary-300 text-xs mt-0.5">Kelola kategori</p>
                </a>
                <a href="/events" class="group bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 hover:bg-white/20 transition-all duration-200 hover:-translate-y-1">
                    <div class="w-10 h-10 rounded-xl bg-primary-500/50 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <p class="text-white font-bold text-sm">Semua Acara</p>
                    <p class="text-primary-300 text-xs mt-0.5">Daftar acara</p>
                </a>
                <a href="/event/create" class="group bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 hover:bg-white/20 transition-all duration-200 hover:-translate-y-1">
                    <div class="w-10 h-10 rounded-xl bg-primary-500/50 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <p class="text-white font-bold text-sm">Tambah Acara</p>
                    <p class="text-primary-300 text-xs mt-0.5">Buat baru</p>
                </a>
                <a href="/" class="group bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 hover:bg-white/20 transition-all duration-200 hover:-translate-y-1">
                    <div class="w-10 h-10 rounded-xl bg-primary-500/50 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <p class="text-white font-bold text-sm">Publik</p>
                    <p class="text-primary-300 text-xs mt-0.5">Lihat katalog</p>
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 80" fill="none" class="w-full" preserveAspectRatio="none">
            <path d="M0 80L480 50L960 65L1440 35V80H0Z" fill="white" opacity="0.05"/>
            <path d="M0 80L360 55L720 70L1080 40L1440 60V80H0Z" fill="white"/>
        </svg>
    </div>
</div>

@endsection

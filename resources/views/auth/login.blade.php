@extends('layouts.app')
@section('title', 'Masuk')
@section('content')

<div class="min-h-[calc(100vh-65px)] flex">

    {{-- ======== LEFT PANEL (Brand) ======== --}}
    <div class="hidden lg:flex lg:w-[45%] xl:w-[40%] relative overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700 flex-col justify-between p-12">

        {{-- Background decorations --}}
        <div class="absolute inset-0 dot-grid opacity-[0.10]"></div>
        <div class="absolute -top-20 -left-20 w-80 h-80 rounded-full bg-primary-500 opacity-20 blur-3xl"></div>
        <div class="absolute -bottom-32 -right-10 w-72 h-72 rounded-full bg-primary-400 opacity-15 blur-3xl"></div>
        <div class="absolute top-1/2 right-[-60px] -translate-y-1/2">
            <div class="w-64 h-64 rounded-full border border-primary-600/30"></div>
            <div class="absolute inset-8 rounded-full border border-primary-500/20"></div>
        </div>

        {{-- Brand --}}
        <div class="relative z-10 flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                <span class="text-white font-black text-base select-none">S</span>
            </div>
            <span class="font-extrabold text-xl text-white tracking-tight">School<span class="text-primary-300">Event</span></span>
        </div>

        {{-- Middle content --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-700/60 border border-primary-600/40 mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-primary-300 animate-pulse"></span>
                <span class="text-primary-200 text-[11px] font-bold uppercase tracking-widest">Platform Sekolah</span>
            </div>
            <h2 class="text-4xl xl:text-5xl font-black text-white leading-tight">
                Masuk dan<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-200 to-primary-400">Kelola Acara</span>
            </h2>
            <p class="mt-4 text-primary-100/70 text-base leading-relaxed max-w-sm">
                Akses panel admin untuk mengelola semua acara dan kegiatan sekolah.
            </p>

            {{-- Feature list --}}
            <ul class="mt-8 space-y-3">
                @foreach(['Kelola acara & kegiatan sekolah', 'Atur kategori dengan mudah', 'Pantau informasi peserta'] as $feat)
                <li class="flex items-center gap-3">
                    <div class="w-6 h-6 rounded-full bg-primary-500/40 border border-primary-400/40 flex items-center justify-center shrink-0">
                        <svg class="w-3.5 h-3.5 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-sm text-primary-100/80 font-medium">{{ $feat }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Bottom --}}
        <div class="relative z-10">
            <p class="text-xs text-primary-400">&copy; 2026 SMK Plus Pelita Nusantara</p>
        </div>
    </div>

    {{-- ======== RIGHT PANEL (Form) ======== --}}
    <div class="flex-1 flex items-center justify-center px-6 py-12 bg-white lg:bg-gray-50/50">
        <div class="w-full max-w-md" x-data="{ showPass: false }">

            {{-- Header --}}
            <div class="mb-8">
                <div class="lg:hidden flex items-center gap-3 mb-8">
                    <div class="w-9 h-9 rounded-xl bg-primary-500 flex items-center justify-center shadow-md shadow-primary-200">
                        <span class="text-white font-black text-sm select-none">S</span>
                    </div>
                    <span class="font-extrabold text-xl text-gray-900">School<span class="text-primary-500">Event</span></span>
                </div>
                <h1 class="text-3xl font-black text-gray-900">Masuk</h1>
                <p class="text-gray-500 text-sm mt-1.5">Selamat datang kembali! Masukkan kredensial Anda.</p>
            </div>

            {{-- Error --}}
            @if ($errors->any())
            <div class="mb-6 flex items-start gap-3 p-4 rounded-2xl bg-red-50 border border-red-200">
                <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-sm text-red-600 font-medium pt-0.5">{{ $errors->first() }}</p>
            </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="/login" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="contoh@email.com" required autofocus
                               class="w-full pl-12 pr-4 py-3.5 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <input :type="showPass ? 'text' : 'password'" id="password" name="password"
                               placeholder="Masukkan password Anda" required
                               class="w-full pl-12 pr-12 py-3.5 rounded-2xl border border-gray-200 bg-white text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:border-primary-400 transition-all duration-200">
                        <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-primary-500 transition-colors duration-200">
                            <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-4 px-6 rounded-2xl text-sm font-bold text-white bg-primary-500 hover:bg-primary-600 shadow-lg shadow-primary-200 hover:shadow-primary-300/60 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    Masuk ke Akun
                </button>
            </form>

            {{-- Divider --}}
            <div class="my-7 flex items-center gap-3">
                <div class="flex-1 h-px bg-gray-100"></div>
                <span class="text-xs text-gray-400 font-medium">atau</span>
                <div class="flex-1 h-px bg-gray-100"></div>
            </div>

            {{-- Register link --}}
            <div class="text-center">
                <p class="text-sm text-gray-500">
                    Belum punya akun?
                    <a href="/register" class="font-bold text-primary-600 hover:text-primary-700 hover:underline transition-colors duration-200 ml-1">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

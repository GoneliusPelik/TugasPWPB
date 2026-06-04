@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="relative min-h-[80vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary-100 via-primary-50 to-white">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <!-- Floating Circles -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-primary-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float-delayed"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float-slow"></div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, #0ea5e9 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
        <!-- Icon -->
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-white shadow-xl shadow-primary-500/10 mb-8 animate-hero-in">
            <svg class="w-10 h-10 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>

        <!-- Title -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight animate-hero-in" style="animation-delay: 0.1s;">
            Selamat Datang!
        </h1>

        <!-- Subtitle -->
        <p class="mt-6 text-lg sm:text-xl text-gray-500 leading-relaxed max-w-xl mx-auto animate-hero-in" style="animation-delay: 0.2s;">
            Sistem Pendaftaran Event Resmi SMK Plus Pelita Nusantara.
        </p>

        <!-- Divider -->
        <div class="flex justify-center items-center gap-3 mt-8 animate-hero-in" style="animation-delay: 0.3s;">
            <span class="h-px w-16 bg-gradient-to-r from-transparent to-primary-300"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-primary-400 ring-4 ring-primary-100"></span>
            <span class="h-px w-16 bg-gradient-to-l from-transparent to-primary-300"></span>
        </div>

        <!-- CTA Button -->
        <div class="mt-10 animate-hero-in" style="animation-delay: 0.4s;">
            <a href="/dashboard" class="group inline-flex items-center gap-3 px-8 py-4 bg-primary-500 text-white font-semibold rounded-2xl shadow-xl shadow-primary-500/30 hover:bg-primary-600 hover:shadow-2xl hover:shadow-primary-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300">
                <span>Masuk Dashboard</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <!-- Trust Badges -->
        <div class="mt-12 flex flex-wrap items-center justify-center gap-6 text-sm text-gray-400 animate-hero-in" style="animation-delay: 0.5s;">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span>Aman & Terpercaya</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span>Cepat & Mudah</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Real-time</span>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(3deg); }
    }
    @keyframes float-delayed {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(-3deg); }
    }
    @keyframes float-slow {
        0%, 100% { transform: translate(-50%, -50%) scale(1); }
        50% { transform: translate(-50%, -50%) scale(1.1); }
    }
    @keyframes hero-in {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-delayed { animation: float-delayed 8s ease-in-out infinite; }
    .animate-float-slow { animation: float-slow 10s ease-in-out infinite; }
    .animate-hero-in { animation: hero-in 0.7s ease-out forwards; opacity: 0; }
</style>
@endsection

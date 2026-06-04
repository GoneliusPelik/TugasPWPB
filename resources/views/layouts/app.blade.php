<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') — SchoolEvent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { 'sans': ['Plus Jakarta Sans', 'sans-serif'] },
                colors: {
                    primary: { 50:'#f0f9ff', 100:'#e0f2fe', 200:'#bae6fd', 300:'#7dd3fc', 400:'#38bdf8', 500:'#0ea5e9', 600:'#0284c7', 700:'#0369a1', 800:'#075985', 900:'#0c4a6e' }
                }
            }
        }
    }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .dot-grid { background-image: radial-gradient(circle, #bae6fd 1.2px, transparent 1.2px); background-size: 22px 22px; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f0f9ff; }
        ::-webkit-scrollbar-thumb { background: #7dd3fc; border-radius: 999px; }
        body { animation: pageFadeIn .3s ease-out; }
        @keyframes pageFadeIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
        @keyframes floatY { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-14px); } }
        @keyframes slideUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        .anim-float { animation: floatY 5s ease-in-out infinite; }
        .anim-float-slow { animation: floatY 7s ease-in-out infinite; }
        .anim-float-fast { animation: floatY 3.5s ease-in-out infinite; }
        .anim-up { animation: slideUp .6s ease-out forwards; opacity: 0; }
        .delay-100 { animation-delay: .1s; }
        .delay-200 { animation-delay: .2s; }
        .delay-300 { animation-delay: .3s; }
        .delay-400 { animation-delay: .4s; }
        .delay-500 { animation-delay: .5s; }
        .line-clamp-2 { display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
        .line-clamp-3 { display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-900 flex flex-col min-h-screen">

    {{-- ======== NAVBAR ======== --}}
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10"
         class="sticky top-0 z-50 transition-all duration-300"
         :class="scrolled ? 'bg-white shadow-md shadow-primary-100/60' : 'bg-white/90 backdrop-blur-xl'">

        {{-- Top gradient accent --}}
        <div class="h-[3px] bg-gradient-to-r from-primary-300 via-primary-500 to-primary-300"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-[62px]">

            {{-- Brand --}}
            <a href="/" class="flex items-center gap-3 shrink-0 group">
                <div class="relative w-9 h-9 rounded-xl bg-primary-500 flex items-center justify-center shadow-lg shadow-primary-200 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                    <span class="text-white font-black text-base leading-none select-none">S</span>
                    <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-primary-300 rounded-full border-2 border-white"></span>
                </div>
                <div class="leading-none">
                    <span class="font-extrabold text-gray-900 text-lg tracking-tight">School<span class="text-primary-500">Event</span></span>
                    <p class="text-[10px] text-gray-400 font-medium mt-0.5">SMK Plus Pelita Nusantara</p>
                </div>
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="/" class="group relative px-4 py-2 text-sm font-semibold text-gray-500 hover:text-primary-600 transition-colors duration-200">
                    Beranda
                    <span class="absolute inset-x-3 -bottom-px h-[2px] bg-primary-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-center duration-200"></span>
                </a>
                @auth
                <a href="/dashboard" class="group relative px-4 py-2 text-sm font-semibold text-gray-500 hover:text-primary-600 transition-colors duration-200">
                    Dashboard
                    <span class="absolute inset-x-3 -bottom-px h-[2px] bg-primary-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-center duration-200"></span>
                </a>
                <a href="/events" class="group relative px-4 py-2 text-sm font-semibold text-gray-500 hover:text-primary-600 transition-colors duration-200">
                    Kelola Acara
                    <span class="absolute inset-x-3 -bottom-px h-[2px] bg-primary-500 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform origin-center duration-200"></span>
                </a>
                @endauth
            </div>

            {{-- Desktop Right --}}
            <div class="hidden md:flex items-center gap-2.5">
                @guest
                    <a href="/login" class="px-4 py-2 text-sm font-semibold text-gray-500 hover:text-primary-600 transition-colors duration-200">Masuk</a>
                    <a href="/register" class="px-5 py-2.5 rounded-xl bg-primary-500 text-white text-sm font-bold shadow-md shadow-primary-200 hover:bg-primary-600 hover:shadow-primary-300/60 hover:-translate-y-0.5 transition-all duration-200">
                        Daftar Sekarang
                    </a>
                @else
                    <div class="relative" x-data="{ dd: false }">
                        <button @click="dd = !dd" class="flex items-center gap-2 px-3 py-1.5 rounded-xl hover:bg-primary-50 transition-colors duration-200 border border-transparent hover:border-primary-100">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-bold text-gray-800 leading-none">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">Administrator</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="dd && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <div x-show="dd" @click.away="dd = false" x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-60 bg-white rounded-2xl shadow-xl shadow-gray-200/70 border border-gray-100 overflow-hidden z-50">
                            <div class="p-4 border-b border-gray-50 bg-gradient-to-br from-primary-50 to-white">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold shadow-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-primary-50 hover:text-primary-700 transition-colors duration-150">
                                    <div class="w-7 h-7 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    </div>
                                    Panel Admin
                                </a>
                                <a href="/events" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-primary-50 hover:text-primary-700 transition-colors duration-150">
                                    <div class="w-7 h-7 rounded-lg bg-primary-50 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    Kelola Acara
                                </a>
                                <div class="my-1.5 border-t border-gray-50 mx-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-xl text-sm font-semibold text-red-500 hover:bg-red-50 hover:text-red-600 transition-colors duration-150">
                                        <div class="w-7 h-7 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        </div>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Mobile hamburger --}}
            <button @click="open = !open" class="md:hidden w-10 h-10 rounded-xl flex items-center justify-center bg-primary-50 hover:bg-primary-100 transition-colors duration-200">
                <svg x-show="!open" class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" x-cloak class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" @click.away="open = false" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-t border-primary-50">
            <div class="px-4 py-3 space-y-0.5">
                <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-150">
                    <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Beranda
                </a>
                @auth
                <a href="/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-150">
                    <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <a href="/events" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-600 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-150">
                    <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Kelola Acara
                </a>
                @endauth
            </div>
            <div class="px-4 pb-4 border-t border-gray-50">
                @guest
                    <div class="flex gap-2 mt-3">
                        <a href="/login" class="flex-1 text-center py-2.5 rounded-xl text-sm font-semibold text-primary-600 border-2 border-primary-200 hover:bg-primary-50 transition-colors duration-150">Masuk</a>
                        <a href="/register" class="flex-1 text-center py-2.5 rounded-xl text-sm font-semibold text-white bg-primary-500 hover:bg-primary-600 transition-colors duration-150">Daftar</a>
                    </div>
                @else
                    <div class="flex items-center gap-3 p-3 mt-3 rounded-2xl bg-primary-50 border border-primary-100">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="/logout" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full py-2.5 rounded-xl text-sm font-semibold text-red-500 hover:bg-red-50 border border-red-100 transition-colors duration-150">
                            Keluar dari Akun
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- ======== CONTENT ======== --}}
    <main class="flex-1">@yield('content')</main>

    {{-- ======== FOOTER ======== --}}
    <footer class="bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-gray-800">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-primary-500 flex items-center justify-center shadow-lg shadow-primary-500/30">
                            <span class="text-white font-black text-base select-none">S</span>
                        </div>
                        <span class="font-extrabold text-xl tracking-tight">School<span class="text-primary-400">Event</span></span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed max-w-sm">Platform informasi acara dan kegiatan resmi SMK Plus Pelita Nusantara. Tetap terhubung dengan semua kegiatan sekolah.</p>
                    <div class="flex items-center gap-2 mt-5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs text-gray-500">Sistem aktif & berjalan</span>
                    </div>
                </div>
                <div>
                    <h3 class="text-[11px] font-bold text-gray-500 uppercase tracking-widest mb-5">Tautan Cepat</h3>
                    <div class="flex flex-col gap-3">
                        <a href="/" class="flex items-center gap-2 text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 group">
                            <span class="w-1 h-1 rounded-full bg-primary-600 group-hover:bg-primary-400 transition-colors"></span>
                            Beranda
                        </a>
                        @auth
                        <a href="/dashboard" class="flex items-center gap-2 text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 group">
                            <span class="w-1 h-1 rounded-full bg-primary-600 group-hover:bg-primary-400 transition-colors"></span>
                            Dashboard Admin
                        </a>
                        <a href="/events" class="flex items-center gap-2 text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 group">
                            <span class="w-1 h-1 rounded-full bg-primary-600 group-hover:bg-primary-400 transition-colors"></span>
                            Kelola Acara
                        </a>
                        @endauth
                        @guest
                        <a href="/login" class="flex items-center gap-2 text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 group">
                            <span class="w-1 h-1 rounded-full bg-primary-600 group-hover:bg-primary-400 transition-colors"></span>
                            Masuk
                        </a>
                        <a href="/register" class="flex items-center gap-2 text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 group">
                            <span class="w-1 h-1 rounded-full bg-primary-600 group-hover:bg-primary-400 transition-colors"></span>
                            Daftar
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-gray-600">&copy; 2026 SMK Plus Pelita Nusantara. Hak cipta dilindungi.</p>
                <p class="text-xs text-gray-700">Dibuat dengan <span class="text-primary-500">♥</span> untuk pendidikan</p>
            </div>
        </div>
    </footer>

</body>
</html>

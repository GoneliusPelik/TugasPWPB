<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolEvent - @yield('title')</title>

    {{-- Google Fonts Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- TailwindCSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { 'sans': ['Inter', 'sans-serif'] },
                colors: {
                    primary: { 50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc', 400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1', 800: '#075985', 900: '#0c4a6e' },
                }
            }
        }
    }
    </script>

    {{-- AlpineJS CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 min-h-screen flex flex-col">

    {{-- ========== NAVBAR ========== --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-100 shadow-sm" x-data="{ mobileOpen: false, profileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Brand --}}
                <a href="/" class="flex items-center gap-2 group">
                    <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 text-white text-lg shadow-md shadow-primary-200 group-hover:shadow-lg group-hover:shadow-primary-300 transition-all duration-300">
                        🎓
                    </span>
                    <span class="text-xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                        SchoolEvent
                    </span>
                </a>

                {{-- Desktop Nav Links --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="/" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                        Home
                    </a>
                    @auth
                    <a href="/dashboard" class="px-4 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                        Dashboard
                    </a>
                    @endauth
                </div>

                {{-- Desktop Right Side --}}
                <div class="hidden md:flex items-center gap-3">
                    @guest
                        <a href="/login" class="px-5 py-2 rounded-lg text-sm font-medium text-primary-600 hover:text-primary-700 hover:bg-primary-50 border border-primary-200 hover:border-primary-300 transition-all duration-200">
                            Login
                        </a>
                        <a href="/register" class="px-5 py-2 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 shadow-md shadow-primary-200 hover:shadow-lg hover:shadow-primary-300 transition-all duration-300">
                            Register
                        </a>
                    @else
                        {{-- User Dropdown --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-primary-50 transition-all duration-200 group">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white text-sm font-semibold shadow-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-gray-700 group-hover:text-primary-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div x-show="open" @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                                 x-cloak
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl shadow-gray-200/50 border border-gray-100 py-2 z-50">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Signed in as</p>
                                    <p class="text-sm font-semibold text-gray-700 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="/dashboard" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    Panel Admin
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                {{-- Mobile Hamburger --}}
                <button @click="mobileOpen = !mobileOpen" class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-primary-50 transition-all duration-200">
                    <svg x-show="!mobileOpen" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" @click.away="mobileOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             x-cloak
             class="md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-lg">
            <div class="px-4 py-4 space-y-1">
                <a href="/" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                    Home
                </a>
                @auth
                <a href="/dashboard" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                    Dashboard
                </a>
                @endauth
            </div>
            <div class="border-t border-gray-100 px-4 py-4">
                @guest
                    <div class="flex flex-col gap-2">
                        <a href="/login" class="block text-center px-4 py-2.5 rounded-lg text-sm font-medium text-primary-600 border border-primary-200 hover:bg-primary-50 transition-all duration-200">
                            Login
                        </a>
                        <a href="/register" class="block text-center px-4 py-2.5 rounded-lg text-sm font-medium text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-200 transition-all duration-200">
                            Register
                        </a>
                    </div>
                @else
                    <div class="flex items-center gap-3 px-4 py-3 mb-2 rounded-lg bg-primary-50">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-semibold shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a href="/dashboard" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:text-primary-600 hover:bg-primary-50 transition-all duration-200">
                        Panel Admin
                    </a>
                    <form method="POST" action="/logout" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2.5 rounded-lg text-sm font-medium text-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-gradient-to-br from-primary-400 to-primary-600 text-white text-xs shadow-sm">
                        🎓
                    </span>
                    <span class="text-sm font-semibold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                        SchoolEvent
                    </span>
                </div>
                <p class="text-sm text-gray-400 font-light">
                    &copy; 2026 SMK Plus Pelita Nusantara
                </p>
            </div>
        </div>
    </footer>

</body>
</html>

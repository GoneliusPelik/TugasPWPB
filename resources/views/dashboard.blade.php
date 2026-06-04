@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- ======== PAGE HEADER ======== --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary-800 to-primary-900 px-4 sm:px-6 lg:px-8 py-10">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-primary-600 opacity-20 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-primary-400 text-[11px] font-bold uppercase tracking-widest">Panel Admin</span>
                        <span class="text-primary-600">—</span>
                        <span class="text-primary-400 text-[11px] font-bold uppercase tracking-widest">SchoolEvent</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black text-white">Manajemen Kategori</h1>
                    <p class="text-primary-300 text-sm mt-1">Kelola kategori untuk pengelompokan acara sekolah.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="/events"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-primary-700/60 border border-primary-600/50 text-white text-sm font-semibold hover:bg-primary-700/80 transition-all duration-200 backdrop-blur-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Kelola Acara
                    </a>
                    <a href="/dashboard/category/create"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-primary-700 text-sm font-bold hover:bg-primary-50 shadow-lg shadow-primary-900/20 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Kategori
                    </a>
                    <a href="/event/create"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-primary-500 text-white text-sm font-bold hover:bg-primary-400 shadow-lg shadow-primary-900/30 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Acara
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Success alert --}}
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             class="mb-6 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="flex-1 pt-0.5">
                <p class="text-sm font-bold text-emerald-800">Berhasil!</p>
                <p class="text-sm text-emerald-600 mt-0.5">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="p-1 text-emerald-400 hover:text-emerald-600 hover:bg-emerald-100 rounded-lg transition-colors duration-150">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        {{-- Stats row --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-primary-50 border border-primary-100 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-black text-gray-900">{{ $categories->count() }}</p>
                    <p class="text-sm text-gray-500 font-medium">Total Kategori</p>
                </div>
            </div>
            <a href="/events" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex items-center gap-4 hover:border-primary-200 hover:shadow-md transition-all duration-200 group">
                <div class="w-12 h-12 rounded-2xl bg-primary-50 border border-primary-100 flex items-center justify-center shrink-0 group-hover:bg-primary-100 transition-colors duration-200">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-700 group-hover:text-primary-600 transition-colors">Kelola Acara</p>
                    <p class="text-xs text-gray-400">Lihat semua acara</p>
                </div>
            </a>
            <a href="/event/create" class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl shadow-md shadow-primary-200 p-5 flex items-center gap-4 hover:from-primary-600 hover:to-primary-700 transition-all duration-200 group">
                <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Buat Acara Baru</p>
                    <p class="text-xs text-primary-100">Tambahkan acara baru</p>
                </div>
            </a>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            {{-- Table header --}}
            <div class="px-6 py-4 border-b border-gray-50 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    </div>
                    <h2 class="text-sm font-bold text-gray-800">Daftar Kategori Acara</h2>
                </div>
                <span class="px-3 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-bold border border-primary-100">
                    {{ $categories->count() }} kategori
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider w-14">No</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Nama Kategori</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">URL Slug</th>
                            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Dibuat</th>
                            <th class="px-6 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($categories as $category)
                        <tr class="hover:bg-primary-50/40 transition-colors duration-150 group">
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-primary-50 text-[11px] font-black text-primary-500 border border-primary-100">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-8 rounded-full bg-gradient-to-b from-primary-400 to-primary-600 shrink-0"></div>
                                    <span class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">{{ $category->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <code class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-gray-50 border border-gray-100 text-xs font-mono text-gray-600">
                                    <span class="text-primary-400">/</span>{{ $category->slug }}
                                </code>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 font-medium">
                                {{ date('d M Y', strtotime($category->created_at)) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="/kategori/{{ $category->id }}/edit"
                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-amber-700 bg-amber-50 hover:bg-amber-100 border border-amber-200 transition-colors duration-150">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </a>
                                    <form action="/kategori/{{ $category->id }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 transition-colors duration-150">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 rounded-3xl bg-primary-50 border-2 border-dashed border-primary-200 flex items-center justify-center mb-5">
                                        <svg class="w-10 h-10 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    </div>
                                    <p class="text-base font-bold text-gray-600">Belum ada kategori</p>
                                    <p class="text-sm text-gray-400 mt-1 mb-5">Mulai dengan menambahkan kategori pertama.</p>
                                    <a href="/dashboard/category/create"
                                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary-500 text-white text-sm font-bold hover:bg-primary-600 shadow-md shadow-primary-200 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Tambah Kategori
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@extends('layouts.app')
@section('title', 'Manajemen Acara')
@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- ======== PAGE HEADER ======== --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary-800 to-primary-900 px-4 sm:px-6 lg:px-8 py-10">
        <div class="absolute inset-0 dot-grid opacity-[0.08]"></div>
        <div class="absolute -left-16 -bottom-16 w-64 h-64 rounded-full bg-primary-600 opacity-20 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <a href="/dashboard" class="text-primary-400 text-[11px] font-bold uppercase tracking-widest hover:text-primary-300 transition-colors">Panel Admin</a>
                        <span class="text-primary-600">—</span>
                        <span class="text-primary-500 text-[11px] font-bold uppercase tracking-widest">Acara</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black text-white">Manajemen Acara</h1>
                    <p class="text-primary-300 text-sm mt-1">Kelola semua acara dan kegiatan sekolah.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="/dashboard"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-primary-700/60 border border-primary-600/50 text-white text-sm font-semibold hover:bg-primary-700/80 transition-all duration-200 backdrop-blur-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Kembali
                    </a>
                    <a href="/event/create"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-primary-700 text-sm font-bold hover:bg-primary-50 shadow-lg shadow-primary-900/20 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Acara Baru
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
             class="mb-6 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 shadow-sm">
            <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="flex-1 pt-0.5">
                <p class="text-sm font-bold text-emerald-800">Berhasil!</p>
                <p class="text-sm text-emerald-600 mt-0.5">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="p-1 text-emerald-400 hover:text-emerald-600 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        {{-- Table Card --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-50 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h2 class="text-sm font-bold text-gray-800">Daftar Semua Acara</h2>
                </div>
                <span class="px-3 py-1 rounded-full bg-primary-50 text-primary-600 text-xs font-bold border border-primary-100">
                    {{ $events->count() }} acara
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50/80 border-b border-gray-100">
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider w-12">No</th>
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider w-16">Poster</th>
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Judul Acara</th>
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Tanggal & Lokasi</th>
                            <th class="px-5 py-3.5 text-left text-[11px] font-bold text-gray-500 uppercase tracking-wider">Kuota</th>
                            <th class="px-5 py-3.5 text-center text-[11px] font-bold text-gray-500 uppercase tracking-wider w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($events as $event)
                        <tr class="hover:bg-primary-50/30 transition-colors duration-150 group">

                            {{-- No --}}
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-gray-50 border border-gray-100 text-[11px] font-black text-gray-500">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            {{-- Poster --}}
                            <td class="px-5 py-4">
                                @if($event->poster)
                                <div class="w-14 h-14 rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                                    <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                </div>
                                @else
                                <div class="w-14 h-14 rounded-xl bg-primary-50 border border-primary-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                @endif
                            </td>

                            {{-- Title --}}
                            <td class="px-5 py-4">
                                <p class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors max-w-[200px] truncate">{{ $event->title }}</p>
                            </td>

                            {{-- Category --}}
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-primary-50 text-primary-600 border border-primary-100">
                                    {{ $event->category->name }}
                                </span>
                            </td>

                            {{-- Date & Location --}}
                            <td class="px-5 py-4">
                                <div class="flex flex-col gap-1.5">
                                    <div class="flex items-center gap-1.5 text-gray-600">
                                        <svg class="w-3.5 h-3.5 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-xs font-semibold whitespace-nowrap">{{ date('d M Y', strtotime($event->event_date)) }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-400">
                                        <svg class="w-3.5 h-3.5 text-primary-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        <span class="text-xs max-w-[120px] truncate">{{ $event->location }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Quota --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-50 border border-blue-100 w-fit">
                                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span class="text-xs font-bold text-blue-600">{{ $event->quota }}</span>
                                </div>
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="/event/{{ $event->id }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-primary-50 text-primary-500 hover:bg-primary-100 border border-primary-100 transition-colors duration-150" title="Lihat">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="/event/{{ $event->id }}/edit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-100 border border-amber-200 transition-colors duration-150" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="/event/{{ $event->id }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus acara ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 border border-red-200 transition-colors duration-150" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 rounded-3xl bg-primary-50 border-2 border-dashed border-primary-200 flex items-center justify-center mb-5">
                                        <svg class="w-10 h-10 text-primary-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                    </div>
                                    <p class="text-base font-bold text-gray-600">Belum ada acara</p>
                                    <p class="text-sm text-gray-400 mt-1 mb-5">Mulai dengan menambahkan acara pertama.</p>
                                    <a href="/event/create"
                                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary-500 text-white text-sm font-bold hover:bg-primary-600 shadow-md shadow-primary-200 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Tambah Acara Pertama
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

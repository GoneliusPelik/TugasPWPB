@extends('layouts.app')

@section('title', 'Manajemen Acara')

@section('content')
<div class="bg-gray-50/50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Manajemen Data Acara</h1>
                <p class="mt-1 text-sm text-gray-500">Kelola semua acara dan kegiatan sekolah.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="/dashboard" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border-2 border-primary-200 text-primary-600 font-semibold text-sm hover:bg-primary-50 hover:border-primary-300 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
                <a href="/event/create" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary-500 text-white font-semibold text-sm shadow-lg shadow-primary-500/25 hover:bg-primary-600 hover:shadow-xl hover:shadow-primary-500/30 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Acara Baru
                </a>
            </div>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="mb-6">
            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex items-start gap-3">
                <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-emerald-800">Berhasil!</p>
                    <p class="text-sm text-emerald-600 mt-0.5">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="flex-shrink-0 text-emerald-400 hover:text-emerald-600 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-primary-50 to-primary-50/50 border-b border-primary-100">
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs w-14">No</th>
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs w-20">Poster</th>
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs">Judul Acara</th>
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs">Kategori</th>
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs">Tanggal & Lokasi</th>
                            <th class="px-5 py-4 text-left font-bold text-primary-800 uppercase tracking-wider text-xs">Kuota</th>
                            <th class="px-5 py-4 text-center font-bold text-primary-800 uppercase tracking-wider text-xs w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($events as $event)
                        <tr class="hover:bg-primary-50/30 transition-colors duration-150">
                            <!-- No -->
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-gray-100 text-xs font-bold text-gray-600">{{ $loop->iteration }}</span>
                            </td>

                            <!-- Poster -->
                            <td class="px-5 py-4">
                                @if ($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}" alt="{{ $event->title }}" class="w-[60px] h-[60px] object-cover rounded-lg border border-gray-100 shadow-sm">
                                @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-xs font-medium text-gray-500">
                                    Tanpa Poster
                                </span>
                                @endif
                            </td>

                            <!-- Title -->
                            <td class="px-5 py-4">
                                <p class="font-semibold text-gray-900 whitespace-nowrap">{{ $event->title }}</p>
                            </td>

                            <!-- Category -->
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-700 border border-primary-200">
                                    {{ $event->category->name }}
                                </span>
                            </td>

                            <!-- Date & Location -->
                            <td class="px-5 py-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-1.5 text-gray-700">
                                        <svg class="w-3.5 h-3.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="text-xs font-medium whitespace-nowrap">{{ date('d M Y', strtotime($event->event_date)) }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-gray-500">
                                        <svg class="w-3.5 h-3.5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="text-xs whitespace-nowrap">{{ $event->location }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Quota -->
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $event->quota }} Orang
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="/event/{{ $event->id }}/edit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition-colors duration-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="/event/{{ $event->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-red-50 text-red-700 border border-red-200 hover:bg-red-100 transition-colors duration-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-5 py-20 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 rounded-full bg-primary-50 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-600">Belum ada data acara</p>
                                    <p class="text-xs text-gray-400">Belum ada data acara yang terdaftar.</p>
                                    <a href="/event/create" class="mt-2 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary-500 text-white text-xs font-semibold hover:bg-primary-600 transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
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

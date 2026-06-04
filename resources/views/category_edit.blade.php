@extends('layouts.app') @section('title', 'Edit Kategori')
@section('content')

    <div class="max-w-xl mx-auto mb-8">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm shadow-gray-200/50 border border-gray-100 overflow-hidden">

            {{-- Card Header (Amber/Warning theme for Edit) --}}
            <div class="bg-gradient-to-r from-amber-400 to-amber-500 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Edit Kategori Acara</h1>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-6 sm:p-8">

                <form action="/kategori/{{ $category->id }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Name Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-primary-700 mb-1.5">Nama Kategori</label>
                        <input type="text" name="name" value="{{ $category->name }}" required
                               class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                    </div>

                    {{-- Slug Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-primary-700 mb-1.5">URL Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" required
                               class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-100"></div>

                    {{-- Buttons --}}
                    <div class="flex items-center justify-between gap-3">
                        <a href="/dashboard"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-semibold text-gray-600 bg-white border-2 border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 shadow-md shadow-amber-200 hover:shadow-lg hover:shadow-amber-300 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

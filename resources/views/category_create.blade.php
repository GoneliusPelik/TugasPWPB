@extends('layouts.app')
@section('content')

    <div class="max-w-xl mx-auto mb-8">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm shadow-gray-200/50 border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Tambah Kategori</h1>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-6 sm:p-8">

                <form action="/dashboard/category/store" method="POST" class="space-y-5">
                    @csrf

                    {{-- Name Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Kategori</label>
                        <input type="text" name="name"
                               class="w-full rounded-xl px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 transition-all duration-200 outline-none border
                                      {{ $errors->has('name') ? 'border-red-300 bg-red-50/50 focus:border-red-400 focus:ring-4 focus:ring-red-100' : 'border-gray-200 bg-gray-50/50 focus:border-primary-400 focus:ring-4 focus:ring-primary-100' }}">
                        @error('name')
                            <p class="mt-1.5 text-xs font-medium text-red-600 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Slug Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">URL Slug</label>
                        <input type="text" name="slug"
                               class="w-full rounded-xl px-4 py-3 text-sm text-gray-700 placeholder:text-gray-400 transition-all duration-200 outline-none border
                                      {{ $errors->has('slug') ? 'border-red-300 bg-red-50/50 focus:border-red-400 focus:ring-4 focus:ring-red-100' : 'border-gray-200 bg-gray-50/50 focus:border-primary-400 focus:ring-4 focus:ring-primary-100' }}">
                        @error('slug')
                            <p class="mt-1.5 text-xs font-medium text-red-600 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-teal-500 to-emerald-500 hover:from-teal-600 hover:to-emerald-600 shadow-md shadow-emerald-200 hover:shadow-lg hover:shadow-emerald-300 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Simpan Kategori
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

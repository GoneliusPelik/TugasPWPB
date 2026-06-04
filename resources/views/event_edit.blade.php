@extends('layouts.app')

@section('content')

    <div class="max-w-3xl mx-auto mb-8">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm shadow-gray-200/50 border border-gray-100 overflow-hidden">

            {{-- Card Header (Amber/Warning theme for Edit) --}}
            <div class="bg-gradient-to-r from-amber-400 to-amber-500 px-6 py-5 sm:px-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Edit Data Acara</h1>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="p-6 sm:p-8">

                <form action="/event/{{ $event->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Category Select --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kategori Acara</label>
                        <select name="category_id" required
                                class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Judul Acara</label>
                        <input type="text" name="title" value="{{ $event->title }}" required
                               class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                    </div>

                    {{-- Date, Location, Quota Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tanggal</label>
                            <input type="date" name="event_date" value="{{ $event->event_date }}" required
                                   class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Lokasi</label>
                            <input type="text" name="location" value="{{ $event->location }}" required
                                   class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Kuota</label>
                            <input type="number" name="quota" value="{{ $event->quota }}" required
                                   class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border">
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Deskripsi</label>
                        <textarea name="description" rows="3" required
                                  class="w-full rounded-xl border-gray-200 bg-gray-50/50 px-4 py-3 text-sm text-gray-700 focus:border-amber-400 focus:ring-4 focus:ring-amber-100 transition-all duration-200 outline-none border resize-y">{{ $event->description }}</textarea>
                    </div>

                    {{-- Poster Section --}}
                    <div x-data="{ imageUrl: null }">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Poster Saat Ini (Abaikan jika tidak diganti)</label>

                        {{-- Current Poster or Preview --}}
                        <div class="mb-3">
                            @if ($event->poster)
                                <img x-show="!imageUrl" src="{{ asset('storage/' . $event->poster) }}"
                                     class="rounded-xl shadow-md border border-gray-200 object-cover"
                                     style="max-height: 250px;">
                            @endif

                            {{-- New Image Preview --}}
                            <img x-show="imageUrl" x-cloak :src="imageUrl"
                                 class="rounded-xl shadow-md border border-gray-200 object-cover"
                                 style="max-height: 250px;">
                        </div>

                        {{-- File Input --}}
                        <div class="relative">
                            <input type="file" id="poster" name="poster" accept="image/*"
                                   @change="
                                       const file = $event.target.files[0];
                                       if (file) {
                                           const reader = new FileReader();
                                           reader.onload = (e) => { imageUrl = e.target.result; };
                                           reader.readAsDataURL(file);
                                       } else {
                                           imageUrl = null;
                                       }
                                   "
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-600 hover:file:bg-amber-100 file:cursor-pointer file:transition-colors cursor-pointer border border-gray-200 rounded-xl bg-gray-50/50">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 shadow-md shadow-amber-200 hover:shadow-lg hover:shadow-amber-300 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            Update Data Acara
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

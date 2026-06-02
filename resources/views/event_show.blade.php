@extends('layouts.app')
@section('title', $event->title)

@section('content')
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
        </ol>
    </nav>

    <div class="row g-4 mb-5">

        {{-- Kolom Poster --}}
        <div class="col-md-5">
            @if ($event->poster)
                <img src="{{ asset('storage/' . $event->poster) }}" class="img-fluid rounded shadow"
                    style="width: 100%; object-fit: cover; max-height: 450px;">
            @else
                <div class="bg-secondary d-flex justify-content-center align-items-center text-white rounded shadow"
                    style="height: 350px;">
                    <span class="fs-5">Tanpa Poster</span>
                </div>
            @endif
        </div>

        {{-- Kolom Informasi Detail --}}
        <div class="col-md-7">
            <span class="badge bg-info text-dark mb-2 fs-6 px-3 py-2">
                {{ $event->category->name }}
            </span>

            <h2 class="fw-bold mt-2 mb-3">{{ $event->title }}</h2>

            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded border">
                        <p class="text-muted small mb-1">Tanggal Pelaksanaan</p>
                        <p class="fw-bold mb-0">{{ date('d M Y', strtotime($event->event_date)) }}</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded border">
                        <p class="text-muted small mb-1">Lokasi</p>
                        <p class="fw-bold mb-0">{{ $event->location }}</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="p-3 bg-light rounded border">
                        <p class="text-muted small mb-1">Kuota Peserta</p>
                        <p class="fw-bold mb-0">
                            <span class="badge bg-warning text-dark fs-6">{{ $event->quota }} Orang</span>
                        </p>
                    </div>
                </div>
            </div>

            <hr>
            <h5 class="fw-bold">Deskripsi Acara</h5>
            <p class="text-muted lh-lg">{{ $event->description }}</p>

            <a href="/" class="btn btn-outline-secondary mt-3 px-4">
                &larr; Kembali ke Katalog
            </a>
        </div>

    </div>
@endsection

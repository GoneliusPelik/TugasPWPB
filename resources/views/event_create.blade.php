@extends('layouts.app')
@section('title', 'Tambah Acara')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold">Formulir Tambah Acara Baru</h5>
                </div>
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/event/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Kategori Acara</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Silakan Pilih --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Acara</label>
                            <input type="text" name="title" class="form-control"
                                placeholder="Contoh: Pensi Akhir Tahun" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tanggal Acara</label>
                                <input type="date" name="event_date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Lokasi Acara</label>
                                <input type="text" name="location" class="form-control"
                                    placeholder="Contoh: Lapangan Utama" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kuota Peserta</label>
                            <input type="number" name="quota" class="form-control" placeholder="Contoh: 100" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Acara</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Tuliskan detail acara di sini..." required></textarea>
                        </div>

                        <hr>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Poster Acara (Maks. 2MB)</label>
                            <img class="img-preview img-fluid d-block mb-2 rounded shadow-sm border"
                                style="display: none !important; max-height: 250px;">
                            <input type="file" class="form-control" id="poster" name="poster" accept="image/*"
                                onchange="previewImage()">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold flex-grow-1">
                                Simpan Data Acara
                            </button>
                            <a href="/events" class="btn btn-outline-secondary btn-lg">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#poster');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection

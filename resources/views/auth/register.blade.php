@extends('layouts.app')
@section('title', 'Daftar Akun')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Buat Akun Baru</h5>
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

                    <form method="POST" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap Anda" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="contoh@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Minimal 8 karakter" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Ulangi password Anda" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg fw-bold">Daftar Sekarang</button>
                        </div>
                    </form>

                    <hr class="my-4">
                    <p class="text-center mb-0">
                        Sudah punya akun? <a href="/login" class="fw-bold">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

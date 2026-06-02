@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0 fw-bold">Masuk ke SchoolEvent</h5>
                </div>
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="contoh@email.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">Masuk</button>
                        </div>
                    </form>

                    <hr class="my-4">
                    <p class="text-center mb-0">
                        Belum punya akun? <a href="/register" class="fw-bold">Daftar di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

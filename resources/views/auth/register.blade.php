@extends('layouts.auth')

@section('title', 'Register')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
    <div class="container-sm p-3" style="width: 450px">
        <div class="card">
            <form action="{{ route('register-process') }}" method="post" class="w-75 mx-auto align-items-center">
                <h1 class="text-center mb-3 mt-5">Instagram</h1>
                <p class="text-center create">Buat akun untuk melihat foto dan video dari teman Anda.</p>
                <button type="button" class="btn btn-primary mt-3 mb-3 w-100 facebook"><i class="bi bi-facebook"></i>Masuk
                    dengan Facebook</button>
                <div class="d-flex justify-content-between">
                    <div class="line-left"></div>
                    <p>ATAU</p>
                    <div class="line-right"></div>
                </div>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @csrf
                @method('POST')
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                        placeholder="email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="full_name" id="full_name"
                        value="{{ old('full_name') }}" placeholder="full_name">
                    <label for="full_name">Full Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="user_name" id="user_name"
                        value="{{ old('user_name') }}" placeholder="user_name">
                    <label for="user_name">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <p class="text-center learn">Orang yang menggunakan layanan kami mungkin telah mengunggah informasi kontak
                    Anda ke Instagram. Pelajari Selengkapnya</p>
                <p class="text-center terms">Dengan mendaftar, berarti Anda menyetujui Ketentuan, Kebijakan Privasi, dan
                    Kebijakan Cookie kami.</p>
                <button type="submit" class="btn btn-primary mb-3 w-100">Register</button>
            </form>
            <div class="card mt-3">
                <p class="text-center mt-3">Punya akun? <a href="{{ route('login') }}"
                        class="text-primary text-decoration-none">Masuk</a></p>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.auth')

@section('title', 'Login')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
    <div class="container-sm py-5" style="width: 400px">
        <div class="card">
            <form action="{{ route('login-process') }}" method="post" class="w-75 mx-auto align-items-center">
                @if ($errors->any())
                    <ul class="alert alert-danger mt-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                <h1 class="text-center mb-5 mt-5">Instagram</h1>
                @csrf
                @method('POST')
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                        placeholder="email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Kata Sandi</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2 mb-3">Login</button>
                <div class="d-flex justify-content-between">
                    <div class="line-left"></div>
                    <p>ATAU</p>
                    <div class="line-right"></div>
                </div>
                <p class="text-center facebook"><i class="bi bi-facebook"></i>Masuk dengan Facebook</p>
                <p class="text-center forgot">Lupa kata sandi?</p>
            </form>
        </div>
        <div class="card mt-3">
            <p class="text-center mt-3">Tidak punya akun? <a href="{{ route('register') }}"
                    class="text-primary text-decoration-none">Buat akun</a> </p>
        </div>
    </div>
@endsection

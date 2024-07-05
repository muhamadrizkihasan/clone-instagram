@extends('layouts.main')

@section('content')
    <h1 class="mb-3">Edit Profile {{ $user->user_name }}</h1>
    <form action="{{ route('instagram.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-floating mb-2">
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                placeholder="email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ $user->full_name }}"
                placeholder="full_name">
            <label for="full_name">Full Name</label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $user->user_name }}"
                placeholder="user_name">
            <label for="user_name">Username</label>
        </div>
        <div class="form-control mb-2">
            <label for="photo_profile">Photo Profile</label>
            <input type="file" class="form-control" id="photo_profile" name="photo_profile" placeholder="photo_profile">
        </div>
        </p>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success mt-3">Ubah Profile</button>
        </div>
    </form>
@endsection

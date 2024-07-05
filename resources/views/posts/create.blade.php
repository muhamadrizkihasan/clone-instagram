@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Buat Postingan</h3>
        <a href="{{ route('instagram.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-control mb-2">
            <label for="image">Image :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" name="body" id="body" placeholder="body">
            <label for="body">Caption</label>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-3">Tambah Postingan</button>
        </div>
    </form>
@endsection

@extends('layouts.main')

@section('content')
    <div class="user-profile">
        <img src="/storage/photo_profiles/{{ $user->photo_profile }}" class="img-detail" width="150" height="150"
            alt="Photo Profile">
        <div class="user-info">
            <div class="d-flex">
                <h5 class="user-detail">{{ $user->user_name }}</h5>
                @if (auth()->user()->id == $user->id)
                    <a href="{{ route('instagram.profile', $user->user_name) }}" class="btn btn-detail mx-1 btn-edit"><b>Edit
                            Profile</b></a>
                    <a href="#" class="btn btn-detail btn-edit"><b>View Archive</b></a>
                    <i class="bi bi-gear"></i>
                @endif
            </div>
            <div class="d-flex mb-4 mt-3">
                <h6 class="count-detail"><b>{{ $posts->count() }}</b> posts</h6>
                <h6 class="count-detail"><b>1,022</b> followers</h6>
                <h6 class="count-detail"><b>727</b> following</h6>
            </div>
            <p class="bio">just the way u look me</p>
        </div>
    </div>

    <div class="line-detail mt-5 mb-3"></div>
    <a href="" class="bi-detail">POSTS</a>
    <a href="" class="bi-detail">SAVED</a>

    <div class="row mt-5 row-detail-post">
        @foreach ($posts as $post)
            <div class="col-4 img-post-profile">
                <img src="/storage/posts/{{ $post->image }}" alt="posts" width="310" height="310">
            </div>
        @endforeach
    </div>
@endsection

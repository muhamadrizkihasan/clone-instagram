@extends('layouts.main')

@section('content')
    <div class="story">
        <div class="photo-wrapper">
            @foreach ($data1['photos'] as $key => $photo)
                <div class="photo-item">
                    <img src="/images/{{ $photo }}" alt="Photo Profile" class="mx-1 stories">
                    <p class="story-name">{{ $data1['names'][$key] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="mb-5">
            <div class="p-4 d-flex profile-post">
                <a href="{{ route('instagram.show', $post->user->user_name) }}">
                    <img src="/storage/photo_profiles/{{ $post->user->photo_profile }}" alt="Photo Profile" width="40"
                        height="40" class="rounded-circle">
                </a>
                <h6 style="margin-top: 11px; margin-left: 12px;"><a
                        href="{{ route('instagram.show', $post->user->user_name) }}">{{ $post->user->user_name }}</a>
                </h6>
                <p style="margin-top: 8px; margin-left: 6px;"> •
                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                <p class="colon">•••</p>
            </div>
            <div class="postingan">
                <img src="/storage/posts/{{ $post->image }}" alt="Postingan" class="img-post" style="width: 73%">
                <div class="action">
                    <i class="bi bi-heart bi-post" onclick="toggleHeart(this)"></i>
                    <i class="bi bi-chat bi-post"></i>
                    <i class="bi bi-send bi-post"></i>
                    <div class="d-flex justify-content-end">
                        <i class="bi bi-bookmark bi-post" onclick="toggleBookmark(this)"></i>
                    </div>
                </div>
                <p><b>14,757 likes</b></p>
                <p class="name-post">
                    <b>
                        <a href="{{ route('instagram.show', $post->user->user_name) }}">
                            {{ $post->user->user_name }}
                        </a>
                    </b>
                    {{ $post->body }}
                </p>
            </div>
        </div>
    @endforeach

    <div class="profile-right">
        <a href="{{ route('instagram.show', auth()->user()->user_name) }}">
            <img src="/storage/photo_profiles/{{ auth()->user()->photo_profile }}" alt="Photo Profile"
                class="img-right mx-1" width="50" height="50">
        </a>
        <div class="text-container">
            <p>
                <b>
                    <a href="{{ route('instagram.show', auth()->user()->user_name) }}">{{ auth()->user()->user_name }}</a>
                </b>
            </p>
            <p>Hello World!</p>
        </div>
        <div class="right-container">
            <p class="text-primary">Switch</p>
        </div>
    </div>

    <div class="suggested">
        <p>Suggested for you</p>
        <p class="see-all"><b>See All</b></p>
    </div>

    <div class="for-you-group">
        @foreach ($data2['photos'] as $key => $photo)
            <div class="for-you">
                <img src="/images/{{ $photo }}" alt="Photo Profile" class="img-suggested mx-1" width="50"
                    height="50">
                <div class="text-container">
                    <p><b>{{ $data2['names'][$key] }}</b></p>
                    <p>Suggested for you</p>
                </div>
                <div class="right-container">
                    <p class="text-primary">Follow</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="about">
        About .
        Help .
        Press .
        API .
        Jobs .
        Privacy .
        Terms .
        Locations .
        Language .
        Meta Verified
    </div>

    <div class="copyright">
        <p>© 2024 INSTAGRAM FROM META</p>
    </div>
@endsection

<script>
    // Function to toggle heart icon color and save status to local storage
    function toggleHeart(icon) {
        icon.classList.toggle('text-danger'); // Toggle red color
        var isRed = icon.classList.contains('text-danger'); // Check if red color applied
        localStorage.setItem('heartColor', isRed ? 'red' : 'default'); // Save status to local storage
    }

    // Function to toggle bookmark icon color and save status to local storage
    function toggleBookmark(icon) {
        icon.classList.toggle('text-warning'); // Toggle yellow color
        var isYellow = icon.classList.contains('text-warning'); // Check if yellow color applied
        localStorage.setItem('bookmarkColor', isYellow ? 'yellow' : 'default'); // Save status to local storage
    }

    // Check local storage and apply colors on page load
    document.addEventListener('DOMContentLoaded', function () {
        var heartColor = localStorage.getItem('heartColor');
        if (heartColor === 'red') {
            document.querySelector('.bi-heart').classList.add('text-danger');
        }

        var bookmarkColor = localStorage.getItem('bookmarkColor');
        if (bookmarkColor === 'yellow') {
            document.querySelector('.bi-bookmark').classList.add('text-warning');
        }
    });
</script>

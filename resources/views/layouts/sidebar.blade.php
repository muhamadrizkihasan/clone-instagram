<div class="sidebar">
    <h4 class="mt-2 mx-2 sidebar-instagram">Instagram</h4>
    <ul class="menu">
        <li class="sidebar-item"><i class="bi bi-house-door-fill sidebar-icon"></i><a
                href="{{ route('instagram.index') }}">Home</a></li>
        <li class="sidebar-item"><i class="bi bi-search sidebar-icon"></i><a href="#">Search</a></li>
        <li class="sidebar-item"><i class="bi bi-compass sidebar-icon"></i><a href="#">Explore</a></li>
        <li class="sidebar-item"><i class="bi bi-file-play sidebar-icon"></i><a href="#">Reels</a></li>
        <li class="sidebar-item"><i class="bi bi-chat sidebar-icon"></i><a href="#">Messages</a></li>
        <li class="sidebar-item"><i class="bi bi-heart sidebar-icon"></i><a href="#">Notifications</a>
        </li>
        <li class="sidebar-item"><i class="bi bi-plus-square sidebar-icon"></i><a
                href="{{ route('posts.create') }}">Create</a></li>
        <li class="sidebar-item">
            <img src="/storage/photo_profiles/{{ auth()->user()->photo_profile }}" alt="Photo Profile"
                class="sidebar-image" width="30" height="30">
            <a href="{{ route('instagram.show', auth()->user()->user_name) }}">Profile</a>
        </li>
        <li class="sidebar-item sidebar-logout"><i class="bi bi-threads sidebar-icon"></i><a href="#">Threads</a>
        </li>
        <li class="sidebar-item"><i class="bi bi-box-arrow-left sidebar-icon"></i><a
                href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>

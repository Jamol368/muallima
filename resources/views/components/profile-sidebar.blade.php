<ul class="">
    <li class="profile-links {{ request()->routeIs('user-balance.edit') ? 'active' : '' }}">
        <a href="{{ route('user-balance.edit') }}" class=""><i class="fas fa-user-circle me-2"></i>
            Profil</a>
    </li>
    <li class="profile-links {{ request()->routeIs('result.index') ? 'active' : '' }}">
        <a href="{{ route('result.index') }}" class=""><i class="fas fa-line-chart me-2"></i> Mening
            natijalarim</a>
    </li>
    <li class="profile-links {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
        <a href="{{ route('profile.edit', ['user_id' => $user['id']]) }}" class=""><i class="fas fa-id-card me-2"></i> Sozlamalar</a>
    </li>
    <li class="profile-links">
        <form method="POST" id="logout" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-sign-out me-2"></i>{{ __('messages.log_out') }}
            </button>
        </form>
    </li>
</ul>

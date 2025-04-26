<nav class="navbar">
    <ul>
        <div class="nav-links">
            <li><a href="{{ route('homepage') }}">Homepage</a></li>
            @auth
                <li><a href="{{ route('profile', ['id' => Auth::id()]) }}">Profilo</a></li>
            @endauth
        </div>
        
        <div class="auth-links">
            @guest
                <li><a href="{{ route('register.form') }}">Registrazione</a></li>
                <li><a href="{{ route('login.form') }}">Login</a></li>
            @else
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </li>
            @endguest
        </div>
    </ul>
</nav>
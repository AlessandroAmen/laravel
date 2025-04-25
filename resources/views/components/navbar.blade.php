<nav class="navbar">
    <ul>
        <li><a href="{{ route('homepage') }}">Homepage</a></li>
        <li><a href="{{ route('register.form') }}">Registrazione</a></li>
        <li><a href="{{ route('login.form') }}">Login</a></li>
        @if(Session::has('user'))
            <li><a href="{{ route('profile', ['id' => Session::get('user')->id]) }}">Profilo</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </li>
        @endif
    </ul>
</nav>
<nav class="navbar is-dark">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-item is-uppercase">
                {{ config('app.name', 'Cartedio') }}
            </a>
            <div class="navbar-burger">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </div>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a href="{{ route('carts') }}" class="navbar-item">View carts</a>
            </div>
            <div class="navbar-end">
                @guest
                    <a href="{{ route('login') }}" class="navbar-item">Login</a>
                    <a href="{{ route('register') }}" class="navbar-item">Register</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ route('home') }}" class="navbar-link">
                            {{ auth()->user()->name }}
                        </a>

                        <div class="navbar-dropdown">
                            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<style>

    .navbar {
        background-color: #f8f9fa;
        padding: 1rem 0;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        font-size: 1.5rem;
        text-decoration: none;
        color: #007bff;
    }

    .navbar-nav {
        list-style: none;
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin-right: 1rem;
    }

    .nav-link {
        text-decoration: none;
        color: #343a40;
        font-weight: bold;
    }

    .nav-link:hover {
        color: #007bff;
    }

    .navbar-nav li {
        margin-right: 1rem;
    }

    .navbar-nav .dropdown {
        position: relative;
    }

    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        min-width: 160px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .dropdown-item:hover {
        background-color: #007bff;
        color: #fff;
    }

    .dropdown-menu a {
        text-decoration: none;
        color: #212529;
    }

    .dropdown-menu a:hover {
        color: #fff;
    }
</style>

<nav class="navbar">
    <div class="nav-container">
        <a class="navbar-brand" href="{{ URL('/') }}">Stacja ładowarek.xD</a>
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Zaloguj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Zarejestruj</a>
                </li>
            @else
                @if(Auth::user()->permission == 'worker')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workers.index') }}">Panel Pracownika</a>
                        <a class="nav-link" href="{{ route('chargers') }}">Lista Ładowarek</a>
                    </li>
                @endif

                @if(Auth::user()->permission == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chargers') }}">Lista Ładowarek</a>
                    </li>

                    @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >Wyloguj</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</nav>

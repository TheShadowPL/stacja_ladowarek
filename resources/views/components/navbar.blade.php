<style>
    .navbar {
        background-color: white;
        position: fixed;
        top: 0;
        width: 100vw;
        height: 3em;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .nav-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 1em;
    }

    .navbar-brand {
        text-decoration: none;
        color: #153131;
        font-weight: bold;
    }

    .attention {
        color: #01ae70;
    }

    .navbar-nav {
        list-style: none;
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        gap: 1.5em
    }

    .nav-item a {
        margin-right: 1em;
    }

    .nav-link {
        text-decoration: none;
        color: #153131;
        font-weight: bold;
    }

    .nav-link:hover {
        color: linear-gradient(180deg, #01ae70 0%, #009d65 100%);
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
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        background: white;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        box-sizing: border-box;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .dropdown-item:hover {
        background: linear-gradient(180deg, #01ae70 0%, #009d65 100%);
        color: #fff;
    }

    .dropdown-menu a {
        text-decoration: none;
        color: #153131;
    }

    .dropdown-menu a:hover {
        color: #fff;
    }
</style>

<nav class="navbar">
    <div class="nav-container">
        <a class="navbar-brand" href="{{ URL('/') }}"><span class="attention">Plug</span>&<span class="attention">Go</span></a>
        <ul class="navbar-nav">
            @guest
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Zaloguj</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Zarejestruj</a>
            </li>
            @else
            @if(Auth::user()->permission == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Panel administratora</a>
                <a class="nav-link" href="{{ route('workers.index') }}">Panel pracownika</a>
                <a class="nav-link" href="{{ route('chargers_list') }}">Lista ładowarek</a>
            </li>
            @endif
            @if(Auth::user()->permission == 'worker')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('workers.index') }}">Panel Pracownika</a>
                <a class="nav-link" href="{{ route('chargers_list') }}">Lista Ładowarek</a>
            </li>
            @endif

            @if(Auth::user()->permission == 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('chargers_list') }}">Lista Ładowarek</a>
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
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Wyloguj</a>
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

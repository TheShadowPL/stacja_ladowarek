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
        <a class="navbar-brand" href="<?php echo e(URL('/')); ?>">Stacja ładowarek.xD</a>
        <ul class="navbar-nav">
            <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->is('login')) ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Zaloguj</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->is('register')) ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Zarejestruj</a>
                </li>
            <?php else: ?>
                <?php if(Auth::user()->permission == 'worker'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('chargers.index')); ?>">Panel Pracownika</a>
                        <a class="nav-link" href="<?php echo e(route('chargers')); ?>">Lista Ładowarek</a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->permission == 'user'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('chargers')); ?>">Lista Ładowarek</a>
                    </li>

                    <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e(Auth::user()->username); ?>

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >Wyloguj</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\resources\views/components/navbar.blade.php ENDPATH**/ ?>
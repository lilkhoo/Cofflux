<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Cofflux</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Cofflux | Dashboard' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Cofflux | About' ? 'active' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === "Cofflux | Menu's" ? 'active' : '' }}" href="/menus">Menu's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Cofflux | Categories' ? 'active' : '' }}"
                        href="/categories">Categories</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome Back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>
                                    My
                                    Dashboard</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard-data"></i> Data User</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                    Logout</button>
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $title === 'Cofflux | Login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>

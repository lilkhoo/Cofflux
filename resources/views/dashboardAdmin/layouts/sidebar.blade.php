<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/menus*') ? 'active' : '' }}" href="/dashboard/menus">
                    <span data-feather="shopping-cart"></span>
                    Data Menu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
                    <span data-feather="users"></span>
                    Data Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/transaksi') ? 'active' : '' }}"
                    href="/dashboard/transaksis">
                    <span data-feather="monitor"></span>
                    Data Transaksi
                </a>
            </li>
        </ul>
    </div>
</nav>

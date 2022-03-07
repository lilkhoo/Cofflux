<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
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

            @can('admin')
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Categories</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                            href="/dashboard/categories">
                            <span data-feather="grid"></span>
                            Menu Categories
                        </a>
                    </li>
                </ul>
            @endcan

            @if (Auth::user()->roles === 'admin')
                {{-- Hanya Admin Yang Bisa Akses --}}
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Admin Only</span>
                </h6>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
                        <span data-feather="users"></span>
                        Data Users
                    </a>
                </li>
            @endif

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Transaksi</span>
            </h6>
            {{-- Roles : Kasir, admin --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active' : '' }}"
                    href="/dashboard/transaksis">
                    <span data-feather="monitor"></span>
                    Data Transaksi
                </a>
            </li>
        </ul>











    </div>
</nav>

<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.admin') ? 'active' : '' }}"
                            href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-tv"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.kontrakan.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.kontrakan.index') }}" href="{{ route('dashboard.kontrakan.index') }}">
                            <i class="fas fa-hotel"></i>
                            <span class="nav-link-text">Kontrakan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.penghuni.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.penghuni.index') }}" href="{{ route('dashboard.penghuni.index') }}">
                            <i class="fas fa-users"></i>
                            <span class="nav-link-text">Penghuni</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.transaksi.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.transaksi.index') }}" href="{{ route('dashboard.transaksi.index') }}">
                            <i class="fas fa-money-bill"></i>
                            <span class="nav-link-text">Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.laporan.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.laporan.index') }}" href="{{ route('dashboard.laporan.index') }}">
                            <i class="fas fa-book"></i>
                            <span class="nav-link-text">Laporan Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.log.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.log.index') }}" href="{{ route('dashboard.log.index') }}">
                            <i class="fa fa-history"></i>
                            <span class="nav-link-text">Log Activity</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>

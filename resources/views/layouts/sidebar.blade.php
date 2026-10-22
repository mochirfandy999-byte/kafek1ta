@php($role = auth()->user()->role)

<button class="sidebar-toggle" type="button" aria-controls="app-sidebar" aria-expanded="false" aria-label="Buka menu">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar-backdrop" data-sidebar-close></div>

<aside class="sidebar" id="app-sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-cup-hot-fill"></i>
        </div>
        <div class="brand-text">
            <h4>Cafe<span>Kita</span></h4>
            <small>Sistem Informasi Cafe</small>
        </div>
    </div>

    <div class="menu-title">Menu Utama</div>
    <nav class="sidebar-menu" aria-label="Menu utama">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        @if($role === 'kasir')
            <a href="{{ route('mejas.index') }}" class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                <span>Data Meja</span>
            </a>
        @endif

        @if($role === 'kasir')
            <a href="{{ route('menus.index') }}" class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i>
                <span>Data Menu</span>
            </a>
        @endif

        @if(in_array($role, ['kasir', 'staff_dapur'], true))
            <a href="{{ route('pemesanans.index') }}" class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Pemesanan</span>
            </a>
        @endif

        @if($role === 'kasir')
            <a href="{{ route('reservasis.index') }}" class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Reservasi</span>
            </a>
        @endif

        @if($role === 'manager')
            <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Laporan</span>
            </a>
        @endif
    </nav>

    <div class="logout-menu">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-left"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<style>
    body.app-with-sidebar {
        padding-left: 260px;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        width: 260px;
        height: 100vh;
        padding: 25px 18px;
        overflow-y: auto;
        background: linear-gradient(160deg, #1f3929, #304e3a);
        color: #fff;
        z-index: 1030;
    }

    body.app-with-sidebar > .sidebar:not(#app-sidebar) {
        display: none !important;
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 5px 10px 30px;
    }

    .brand-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.12);
        color: #d9b56d;
        font-size: 24px;
    }

    .brand-text h4 {
        margin: 0;
        font-size: 21px;
        font-weight: 800;
        letter-spacing: -0.3px;
    }

    .brand-text h4 span {
        color: #d9b56d;
    }

    .brand-text small {
        color: rgba(255, 255, 255, 0.58);
        font-size: 11px;
    }

    .sidebar .menu-title {
        margin: 12px 0 10px;
        padding: 0 12px;
        color: rgba(255, 255, 255, 0.42);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }

    .sidebar-menu {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu a,
    .logout-menu button {
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        padding: 12px 14px;
        border: 0;
        border-radius: 12px;
        background: transparent;
        color: rgba(255, 255, 255, 0.72);
        font-size: 14px;
        font-weight: 500;
        text-align: left;
        text-decoration: none;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .sidebar-menu a i,
    .logout-menu button i {
        width: 20px;
        font-size: 17px;
        text-align: center;
    }

    .sidebar-menu a:hover,
    .logout-menu button:hover {
        background: rgba(255, 255, 255, 0.09);
        color: #fff;
    }

    .sidebar-menu a.active {
        background: rgba(255, 255, 255, 0.13);
        box-shadow: inset 3px 0 0 #d9b56d;
        color: #fff;
    }

    .sidebar-menu a.active i {
        color: #d9b56d;
    }

    .logout-menu {
        margin-top: auto;
        padding-top: 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logout-menu form {
        margin: 0;
    }

    .logout-menu button {
        cursor: pointer;
    }

    .logout-menu button:hover {
        color: #ffb0b0;
    }

    .sidebar-toggle,
    .sidebar-backdrop {
        display: none;
    }

    body.app-with-sidebar .main-content {
        width: 100%;
        margin-left: 0 !important;
    }

    @media (max-width: 768px) {
        body.app-with-sidebar {
            padding: 66px 15px 15px;
        }

        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.25s ease;
        }

        .sidebar.is-open {
            transform: translateX(0);
        }

        .sidebar-toggle {
            position: fixed;
            top: 14px;
            left: 14px;
            z-index: 1031;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border: 0;
            border-radius: 12px;
            background: #1f3929;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
            font-size: 24px;
        }

        .sidebar-backdrop.is-visible {
            position: fixed;
            inset: 0;
            z-index: 1029;
            display: block;
            background: rgba(0, 0, 0, 0.45);
        }
    }
</style>

<script>
    const sidebar = document.getElementById('app-sidebar');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebarBackdrop = document.querySelector('.sidebar-backdrop');

    const closeSidebar = () => {
        sidebar.classList.remove('is-open');
        sidebarBackdrop.classList.remove('is-visible');
        sidebarToggle.setAttribute('aria-expanded', 'false');
        sidebarToggle.setAttribute('aria-label', 'Buka menu');
    };

    sidebarToggle.addEventListener('click', () => {
        const isOpen = sidebar.classList.toggle('is-open');
        sidebarBackdrop.classList.toggle('is-visible', isOpen);
        sidebarToggle.setAttribute('aria-expanded', String(isOpen));
        sidebarToggle.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    });

    sidebarBackdrop.addEventListener('click', closeSidebar);
    sidebar.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeSidebar));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });
</script>
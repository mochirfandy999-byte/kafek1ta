<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - CafeKita</title>

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f5f7f5;
            color: #202923;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            padding: 25px 18px;
            background:
                linear-gradient(
                    160deg,
                    #1f3929,
                    #304e3a
                );
            color: white;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.15);
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
            color: rgba(255,255,255,0.58);
            font-size: 11px;
        }

        .menu-title {
            padding: 0 12px;
            margin: 12px 0 10px;
            color: rgba(255,255,255,0.42);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            color: rgba(255,255,255,0.72);
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu a i {
            width: 20px;
            font-size: 17px;
            text-align: center;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.09);
            color: white;
            transform: translateX(2px);
        }

        .sidebar-menu a.active {
            background: rgba(255,255,255,0.13);
            color: white;
            box-shadow: inset 3px 0 0 #d9b56d;
        }

        .sidebar-menu a.active i {
            color: #d9b56d;
        }

        .logout-menu {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,0.10);
        }

        .logout-menu button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            border: none;
            border-radius: 12px;
            background: transparent;
            color: rgba(255,255,255,0.68);
            font-size: 14px;
            text-align: left;
            transition: 0.2s;
        }

        .logout-menu button:hover {
            background: rgba(255,255,255,0.08);
            color: #ffb0b0;
        }

        .logout-menu button i {
            width: 20px;
            font-size: 17px;
            text-align: center;
        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 25px 32px 35px;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .page-title h2 {
            margin: 0;
            font-size: 27px;
            font-weight: 750;
            color: #202923;
            letter-spacing: -0.5px;
        }

        .page-title p {
            margin: 5px 0 0;
            color: #858d87;
            font-size: 13px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px 8px 8px;
            background: white;
            border: 1px solid #e7ebe7;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(35, 54, 41, 0.04);
        }

        .user-avatar {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e7eee9;
            color: #304e3a;
            font-size: 19px;
        }

        .user-info {
            line-height: 1.25;
        }

        .user-info strong {
            display: block;
            color: #29332d;
            font-size: 13px;
        }

        .user-info span {
            display: inline-block;
            margin-top: 3px;
            padding: 3px 8px;
            border-radius: 20px;
            background: #edf3ee;
            color: #466b52;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }


        /* =====================================================
           WELCOME CARD
        ===================================================== */

        .welcome-card {
            position: relative;
            overflow: hidden;
            min-height: 175px;
            padding: 32px;
            border-radius: 22px;
            color: white;
            background:
                linear-gradient(
                    125deg,
                    #294735,
                    #456a50
                );
            box-shadow: 0 12px 30px rgba(48,78,58,0.16);
            margin-bottom: 25px;
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.09);
            right: -80px;
            top: -100px;
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.07);
            right: 15px;
            bottom: -100px;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-label {
            color: rgba(255,255,255,0.65);
            font-size: 12px;
            margin-bottom: 7px;
        }

        .welcome-title {
            margin: 0;
            font-size: 28px;
            font-weight: 750;
        }

        .welcome-title span {
            color: #e2c47f;
        }

        .welcome-description {
            margin: 9px 0 0;
            max-width: 600px;
            color: rgba(255,255,255,0.70);
            font-size: 13px;
        }

        .welcome-icon {
            position: absolute;
            right: 45px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 80px;
            color: rgba(255,255,255,0.08);
        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .section-heading h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #303a34;
        }

        .section-heading span {
            color: #929a94;
            font-size: 12px;
        }

        .stat-card {
            height: 100%;
            padding: 21px;
            border-radius: 18px;
            background: white;
            border: 1px solid #e9ede9;
            box-shadow: 0 5px 18px rgba(35,54,41,0.04);
            transition: 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(35,54,41,0.08);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3ee;
            color: #466b52;
            font-size: 19px;
        }

        .stat-icon.gold {
            background: #faf4e6;
            color: #ad8741;
        }

        .stat-number {
            margin-top: 18px;
            font-size: 27px;
            font-weight: 800;
            color: #263129;
        }

        .stat-label {
            margin-top: 3px;
            color: #858d87;
            font-size: 12px;
        }


        /* =====================================================
           QUICK MENU
        ===================================================== */

        .quick-section {
            margin-top: 28px;
        }

        .quick-card {
            display: flex;
            align-items: center;
            gap: 14px;
            height: 100%;
            padding: 17px;
            border: 1px solid #e9ede9;
            border-radius: 16px;
            background: white;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .quick-card:hover {
            transform: translateY(-2px);
            border-color: #d7dfd9;
            box-shadow: 0 10px 22px rgba(35,54,41,0.06);
        }

        .quick-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #edf3ee;
            color: #466b52;
            font-size: 18px;
        }

        .quick-info strong {
            display: block;
            color: #303a34;
            font-size: 13px;
        }

        .quick-info span {
            color: #929993;
            font-size: 11px;
        }

        .quick-arrow {
            margin-left: auto;
            color: #b1b8b2;
            font-size: 14px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .dashboard-footer {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #e3e8e4;
            text-align: center;
            color: #a0a7a2;
            font-size: 11px;
        }

        .dashboard-footer strong {
            color: #657069;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 992px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 22px;
            }

            .welcome-icon {
                display: none;
            }

        }

        @media (max-width: 768px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                border-radius: 0 0 20px 20px;
            }

            .sidebar-brand {
                padding-bottom: 20px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .page-title h2 {
                font-size: 23px;
            }

            .user-profile {
                padding: 6px;
            }

            .user-info {
                display: none;
            }

            .welcome-card {
                padding: 25px;
            }

            .welcome-title {
                font-size: 23px;
            }

        }

        @media (max-width: 480px) {

            .topbar {
                flex-direction: column;
            }

            .user-profile {
                width: 100%;
            }

            .user-info {
                display: block;
            }

            .welcome-card {
                min-height: 160px;
            }

        }

    </style>
</head>

<body class="app-with-sidebar">
    @include('layouts.sidebar')

    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside class="sidebar">

        <div class="sidebar-brand">

            <div class="brand-icon">
                <i class="bi bi-cup-hot-fill"></i>
            </div>

            <div class="brand-text">

                <h4>
                    Cafe<span>Kita</span>
                </h4>

                <small>
                    Sistem Informasi Cafe
                </small>

            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>

        <div class="sidebar-menu">

            {{-- Dashboard (Semua Role) --}}
            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>


            {{-- Data Meja (Hanya Kasir) --}}
            @if(auth()->user()->role === 'kasir')

                <a
                    href="{{ route('mejas.index') }}"
                    class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    <span>Data Meja</span>
                </a>

            @endif
{{-- Data Menu (Hanya Kasir) --}}
@if(auth()->user()->role === 'kasir')
    <a href="{{ route('menus.index') }}" class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
        <i class="bi bi-journal-text"></i>
        <span>Data Menu</span>
    </a>
@endif
            {{-- Pemesanan (Kasir & Staff Dapur) --}}
            @if(in_array(auth()->user()->role, ['kasir', 'staff_dapur']))

                <a
                    href="{{ route('pemesanans.index') }}"
                    class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>Pemesanan</span>
                </a>

            @endif


            {{-- Reservasi (Hanya Kasir) --}}
            @if(auth()->user()->role === 'kasir')

                <a
                    href="{{ route('reservasis.index') }}"
                    class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-calendar-check-fill"></i>
                    <span>Reservasi</span>
                </a>

            @endif


            {{-- Laporan (Khusus Manager) --}}
            @if(auth()->user()->role === 'manager')

                <a
                    href="{{ route('laporan.index') }}"
                    class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}"
                >
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Laporan</span>
                </a>

            @endif

        </div>


        {{-- Logout --}}
        <div class="logout-menu">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button type="submit">

                    <i class="bi bi-box-arrow-left"></i>

                    <span>Keluar</span>

                </button>

            </form>

        </div>

    </aside>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">


        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="page-title">

                <h2>
                    Dashboard
                </h2>

                <p>
                    Ringkasan aktivitas sistem CafeKita
                </p>

            </div>


            <div class="user-profile">

                <div class="user-avatar">

                    <i class="bi bi-person-fill"></i>

                </div>

                <div class="user-info">

                    <strong>
                        {{ auth()->user()->nama }}
                    </strong>

                    <span>
                        {{ str_replace('_', ' ', auth()->user()->role) }}
                    </span>

                </div>

            </div>

        </div>


        {{-- WELCOME --}}
        <div class="welcome-card">

            <div class="welcome-content">

                <div class="welcome-label">
                    Selamat datang kembali 👋
                </div>

                <h1 class="welcome-title">

                    Halo,
                    <span>{{ auth()->user()->nama }}</span>

                </h1>

                <p class="welcome-description">

                    Kelola aktivitas CafeKita dengan mudah melalui
                    dashboard ini. Pastikan setiap proses berjalan
                    dengan baik dan terorganisir.

                </p>

            </div>

            <div class="welcome-icon">

                <i class="bi bi-cup-hot-fill"></i>

            </div>

        </div>


        {{-- STATISTICS --}}
        <div class="section-heading">

            <h5>
                Ringkasan Data
            </h5>

            <span>
                Data saat ini
            </span>

        </div>


        <div class="row g-3">


            {{-- RINGKASAN DATA MEJA (Kasir & Manager) --}}
            @if(in_array(auth()->user()->role, ['kasir', 'manager']))

                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon">

                                <i class="bi bi-grid-3x3-gap-fill"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $jumlahMeja }}
                        </div>

                        <div class="stat-label">
                            Jumlah Meja
                        </div>

                    </div>

                </div>


                {{-- MEJA TERSEDIA --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon">

                                <i class="bi bi-check-circle-fill"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $mejaTersedia }}
                        </div>

                        <div class="stat-label">
                            Meja Tersedia
                        </div>

                    </div>

                </div>


                {{-- MEJA TERISI --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon gold">

                                <i class="bi bi-people-fill"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $mejaTerisi }}
                        </div>

                        <div class="stat-label">
                            Meja Terisi
                        </div>

                    </div>

                </div>


                {{-- RESERVASI --}}
                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon gold">

                                <i class="bi bi-calendar-check-fill"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ $jumlahReservasi }}
                        </div>

                        <div class="stat-label">
                            Meja Reservasi
                        </div>

                    </div>

                </div>

            @else

                {{-- KHUSUS STAFF DAPUR --}}

                <div class="col-12 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon">

                                <i class="bi bi-receipt-cutoff"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ \App\Models\Pemesanan::count() }}
                        </div>

                        <div class="stat-label">
                            Total Pemesanan
                        </div>

                    </div>

                </div>


                <div class="col-12 col-md-6">

                    <div class="stat-card">

                        <div class="stat-top">

                            <div class="stat-icon gold">

                                <i class="bi bi-clock-history"></i>

                            </div>

                        </div>

                        <div class="stat-number">
                            {{ \App\Models\Pemesanan::where('status', 'pending')->count() }}
                        </div>

                        <div class="stat-label">
                            Pemesanan Pending
                        </div>

                    </div>

                </div>

            @endif

        </div>


        {{-- QUICK MENU --}}
        <div class="quick-section">

            <div class="section-heading">

                <h5>
                    Akses Cepat
                </h5>

                <span>
                    Menu yang tersedia
                </span>

            </div>


            <div class="row g-3">


                {{-- DATA MEJA (Hanya Kasir) --}}
                @if(auth()->user()->role === 'kasir')

                    <div class="col-12 col-md-6 col-xl-4">

                        <a
                            href="{{ route('mejas.index') }}"
                            class="quick-card"
                        >

                            <div class="quick-icon">

                                <i class="bi bi-grid-3x3-gap-fill"></i>

                            </div>

                            <div class="quick-info">

                                <strong>
                                    Data Meja
                                </strong>

                                <span>
                                    Kelola meja cafe
                                </span>

                            </div>

                            <div class="quick-arrow">

                                <i class="bi bi-chevron-right"></i>

                            </div>

                        </a>

                    </div>

                @endif


                {{-- PEMESANAN (Kasir & Staff Dapur) --}}
                @if(in_array(auth()->user()->role, ['kasir', 'staff_dapur']))

                    <div class="col-12 col-md-6 col-xl-4">

                        <a
                            href="{{ route('pemesanans.index') }}"
                            class="quick-card"
                        >

                            <div class="quick-icon">

                                <i class="bi bi-receipt-cutoff"></i>

                            </div>

                            <div class="quick-info">

                                <strong>
                                    Pemesanan
                                </strong>

                                <span>
                                    Kelola pemesanan cafe
                                </span>

                            </div>

                            <div class="quick-arrow">

                                <i class="bi bi-chevron-right"></i>

                            </div>

                        </a>

                    </div>

                @endif


                {{-- RESERVASI (Hanya Kasir) --}}
                @if(auth()->user()->role === 'kasir')

                    <div class="col-12 col-md-6 col-xl-4">

                        <a
                            href="{{ route('reservasis.index') }}"
                            class="quick-card"
                        >

                            <div class="quick-icon">

                                <i class="bi bi-calendar-check-fill"></i>

                            </div>

                            <div class="quick-info">

                                <strong>
                                    Reservasi
                                </strong>

                                <span>
                                    Kelola reservasi pelanggan
                                </span>

                            </div>

                            <div class="quick-arrow">

                                <i class="bi bi-chevron-right"></i>

                            </div>

                        </a>

                    </div>

                @endif


                {{-- LAPORAN (Khusus Manager) --}}
                @if(auth()->user()->role === 'manager')

                    <div class="col-12 col-md-6 col-xl-4">

                        <a
                            href="{{ route('laporan.index') }}"
                            class="quick-card"
                        >

                            <div class="quick-icon">

                                <i class="bi bi-bar-chart-fill"></i>

                            </div>

                            <div class="quick-info">

                                <strong>
                                    Laporan
                                </strong>

                                <span>
                                    Lihat laporan cafe
                                </span>

                            </div>

                            <div class="quick-arrow">

                                <i class="bi bi-chevron-right"></i>

                            </div>

                        </a>

                    </div>

                @endif

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="dashboard-footer">

            Sistem Informasi
            <strong>CafeKita</strong>

            &nbsp;•&nbsp;

            © {{ date('Y') }}

        </div>

    </main>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>
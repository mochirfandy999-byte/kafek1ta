<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Meja - CafeKita</title>

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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            padding: 25px 18px;
            background: linear-gradient(160deg, #1f3929, #304e3a);
            color: white;
            z-index: 1000;
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
            transition: 0.2s;
        }

        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.09);
            color: white;
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
        }

        .logout-menu button:hover {
            background: rgba(255,255,255,0.08);
            color: #ffb0b0;
        }

        .logout-menu i {
            width: 20px;
            text-align: center;
        }

        /* MAIN */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 25px 32px 35px;
        }

        /* TOPBAR */
        .topbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-title h2 {
            margin: 0;
            font-size: 27px;
            font-weight: 750;
            color: #202923;
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
            box-shadow: 0 4px 15px rgba(35,54,41,0.04);
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
        }

        /* CONTENT CARD */
        .content-card {
            background: white;
            border: 1px solid #e8ece8;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(35,54,41,0.04);
            overflow: hidden;
        }

        .content-header {
            padding: 22px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #edf0ed;
        }

        .content-header h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
        }

        .content-header p {
            margin: 4px 0 0;
            font-size: 12px;
            color: #909790;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: none;
            border-radius: 11px;
            background: #304e3a;
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #243e2e;
            color: white;
            transform: translateY(-1px);
        }

        /* ALERT */
        .alert-custom {
            margin: 20px 25px 0;
            border: none;
            border-radius: 12px;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrapper {
            padding: 0 20px 20px;
            overflow-x: auto;
        }

        .table {
            margin: 0;
            vertical-align: middle;
        }

        .table thead th {
            padding: 15px 12px;
            background: #f8faf8;
            color: #68736c;
            border-bottom: 1px solid #e7ebe7;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 12px;
            border-color: #edf0ed;
            color: #4f5952;
            font-size: 13px;
        }

        .table tbody tr:hover {
            background: #fafcfa;
        }

        .table-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 34px;
            padding: 0 10px;
            border-radius: 9px;
            background: #edf3ee;
            color: #304e3a;
            font-weight: 700;
        }

        /* STATUS */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-tersedia {
            background: #e9f5ed;
            color: #287044;
        }

        .status-terisi {
            background: #fff1e5;
            color: #a86424;
        }

        .status-reservasi {
            background: #f8f0dc;
            color: #9a742e;
        }

        /* ACTION */
        .action-group {
            display: flex;
            gap: 6px;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-edit {
            background: #edf3ee;
            color: #466b52;
        }

        .btn-edit:hover {
            background: #dfeae1;
            color: #304e3a;
        }

        .btn-delete {
            background: #fff0f0;
            color: #b24b4b;
        }

        .btn-delete:hover {
            background: #ffe0e0;
            color: #963a3a;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #929a94;
        }

        .empty-state i {
            font-size: 42px;
            color: #c7cec8;
            margin-bottom: 12px;
        }

        .empty-state h6 {
            color: #68736c;
            margin-bottom: 5px;
        }

        .empty-state p {
            font-size: 12px;
            margin: 0;
        }

        /* FOOTER */
        .dashboard-footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e3e8e4;
            text-align: center;
            color: #a0a7a2;
            font-size: 11px;
        }

        .dashboard-footer strong {
            color: #657069;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .content-header {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .user-info {
                display: none;
            }

            .table-wrapper {
                padding: 0 10px 10px;
            }
        }
    </style>
</head>

<body class="app-with-sidebar">
    @include('layouts.sidebar')

    {{-- SIDEBAR --}}
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

    {{-- Dashboard --}}
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
    </a>

    {{-- Data Meja --}}
    @if(auth()->user()->role === 'kasir')
        <a href="{{ route('mejas.index') }}" class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">
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
    {{-- Pemesanan --}}
    @if(in_array(auth()->user()->role, ['kasir', 'staff_dapur']))
        <a href="{{ route('pemesanans.index') }}" class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}">
            <i class="bi bi-receipt-cutoff"></i>
            <span>Pemesanan</span>
        </a>
    @endif

    {{-- Reservasi --}}
    @if(auth()->user()->role === 'kasir')
        <a href="{{ route('reservasis.index') }}" class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check-fill"></i>
            <span>Reservasi</span>
        </a>
    @endif

    {{-- Laporan --}}
    @if(auth()->user()->role === 'manager')
        <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-fill"></i>
            <span>Laporan</span>
        </a>
    @endif

</div>

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


    {{-- MAIN --}}
    <main class="main-content">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="page-title">

                <h2>
                    Data Meja
                </h2>

                <p>
                    Kelola data dan status meja CafeKita
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


        {{-- CONTENT --}}
        <div class="content-card">

            <div class="content-header">

                <div>

                    <h5>
                        <i class="bi bi-grid-3x3-gap-fill me-2"
                           style="color:#466b52;"></i>
                        Daftar Meja
                    </h5>

                    <p>
                        Daftar meja yang tersedia di CafeKita
                    </p>

                </div>

                <a
                    href="{{ route('mejas.create') }}"
                    class="btn-add"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Meja
                </a>

            </div>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success alert-custom">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div class="alert alert-danger alert-custom">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    {{ session('error') }}

                </div>

            @endif


            {{-- TABLE --}}
            <div class="table-wrapper mt-3">

                @if($mejas->count() > 0)

                    <table class="table">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Nomor Meja</th>

                                <th>Kapasitas</th>

                                <th>Status</th>

                                <th>Keterangan</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($mejas as $meja)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        <span class="table-number">

                                            {{ $meja->nomor_meja }}

                                        </span>

                                    </td>

                                    <td>

                                        <i
                                            class="bi bi-people-fill me-1"
                                            style="color:#718078;"
                                        ></i>

                                        {{ $meja->kapasitas }} orang

                                    </td>

                                    <td>

                                        @if($meja->status === 'tersedia')

                                            <span class="badge-status status-tersedia">

                                                <i class="bi bi-check-circle-fill"></i>

                                                Tersedia

                                            </span>

                                        @elseif($meja->status === 'terisi')

                                            <span class="badge-status status-terisi">

                                                <i class="bi bi-person-fill"></i>

                                                Terisi

                                            </span>

                                        @else

                                            <span class="badge-status status-reservasi">

                                                <i class="bi bi-calendar-check-fill"></i>

                                                Reservasi

                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        {{ $meja->keterangan ?: '-' }}

                                    </td>

                                    <td>

                                        <div class="action-group">

                                            <a
                                                href="{{ route('mejas.edit', $meja->id) }}"
                                                class="btn-action btn-edit"
                                                title="Edit"
                                            >
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form
                                                action="{{ route('mejas.destroy', $meja->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus meja ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-action btn-delete"
                                                    title="Hapus"
                                                >
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty-state">

                        <i class="bi bi-grid-3x3-gap"></i>

                        <h6>
                            Belum Ada Data Meja
                        </h6>

                        <p>
                            Silakan tambahkan data meja terlebih dahulu.
                        </p>

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

</body>

</html>
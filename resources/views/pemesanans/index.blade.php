<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pemesanan - CafeKita</title>

    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        :root {
            --hijau: #304e3a;
            --hijau-tua: #243e2e;
            --hijau-muda: #edf3ee;
            --gold: #d9b56d;
            --bg: #f5f7f5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: "Segoe UI", Arial, sans-serif;
            color: #333;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background: var(--hijau);
            padding: 25px 18px;
            color: white;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            margin-bottom: 35px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            border-radius: 13px;
            background: rgba(217, 181, 109, 0.15);
            color: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .brand h4 {
            margin: 0;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .brand small {
            color: rgba(255,255,255,.65);
            font-size: 11px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            color: rgba(255,255,255,.45);
            margin: 0 12px 10px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 6px;
        }

        .sidebar-menu a,
        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: rgba(255,255,255,.78);
            text-decoration: none;
            border: none;
            background: transparent;
            transition: .2s;
            font-size: 14px;
        }

        .sidebar-menu a i,
        .logout-button i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .sidebar-menu a:hover,
        .logout-button:hover {
            background: rgba(255,255,255,.08);
            color: white;
        }

        .sidebar-menu a.active {
            background: rgba(255,255,255,.12);
            color: white;
            border-left: 4px solid var(--gold);
            padding-left: 10px;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            left: 18px;
            right: 18px;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 75px;
            background: white;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 35px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--hijau-muda);
            color: var(--hijau);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-role {
            font-size: 11px;
            color: #8a8a8a;
            text-transform: uppercase;
        }

        /* =========================
           PAGE
        ========================= */

        .page-content {
            padding: 30px 35px;
        }

        .page-title {
            color: var(--hijau);
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #888;
            margin-bottom: 0;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-cafe {
            background: var(--hijau);
            color: white;
            border: none;
            border-radius: 11px;
            padding: 10px 16px;
            font-weight: 500;
        }

        .btn-cafe:hover {
            background: var(--hijau-tua);
            color: white;
        }

        .btn-outline-cafe {
            border: 1px solid var(--hijau);
            color: var(--hijau);
            background: white;
            border-radius: 11px;
            padding: 9px 15px;
        }

        .btn-outline-cafe:hover {
            background: var(--hijau);
            color: white;
        }

        /* =========================
           STAT CARD
        ========================= */

        .stat-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(35,54,41,.06);
            height: 100%;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 13px;
            background: var(--hijau-muda);
            color: var(--hijau);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: 700;
            color: var(--hijau);
            margin-bottom: 2px;
        }

        .stat-label {
            color: #888;
            font-size: 13px;
        }

        /* =========================
           TABLE CARD
        ========================= */

        .table-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(35,54,41,.06);
            overflow: hidden;
        }

        .table-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-card-title {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: var(--hijau);
        }

        .table-card-subtitle {
            color: #999;
            font-size: 12px;
            margin-top: 3px;
        }

        .table-card-body {
            padding: 0;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #fafbfa;
            color: #777;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .3px;
            font-weight: 600;
            border-bottom: 1px solid #eeeeee;
            padding: 15px 18px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 18px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 13px;
            color: #555;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #fafcfb;
        }

        .transaction-number {
            color: var(--hijau);
            font-weight: 700;
        }

        .total-bayar {
            color: var(--hijau);
            font-weight: 700;
        }

        /* =========================
           BADGE
        ========================= */

        .status-badge {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================
           ACTION BUTTON
        ========================= */

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .btn-edit {
            background: #fff4d9;
            color: #9a751e;
        }

        .btn-edit:hover {
            background: var(--gold);
            color: white;
        }

        .btn-delete {
            background: #fdeaea;
            color: #dc3545;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            border: none;
            border-radius: 13px;
        }

        /* =========================
           EMPTY DATA
        ========================= */

        .empty-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--hijau-muda);
            color: var(--hijau);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            margin: 0 auto 12px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .sidebar {
                width: 210px;
            }

            .main-content {
                margin-left: 210px;
            }

            .page-content {
                padding: 25px 20px;
            }

            .topbar {
                padding: 0 20px;
            }

        }

        @media (max-width: 768px) {

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .sidebar-bottom {
                position: relative;
                left: auto;
                right: auto;
                bottom: auto;
                margin-top: 20px;
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                height: auto;
                padding: 15px 20px;
            }

            .page-content {
                padding: 20px 15px;
            }

        }

    </style>
</head>

<body>

{{-- =====================================================
     SIDEBAR
===================================================== --}}

<div class="sidebar">

    {{-- BRAND --}}
    <div class="brand">

        <div class="brand-icon">
            <i class="bi bi-cup-hot-fill"></i>
        </div>

        <div>
            <h4>CafeKita</h4>
            <small>Management System</small>
        </div>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>


    <ul class="sidebar-menu">

        {{-- DASHBOARD --}}
        <li>

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>

        </li>


        {{-- DATA MEJA --}}
        @if(in_array(auth()->user()->role, ['kasir', 'manager']))

            <li>

                <a href="{{ route('mejas.index') }}"
                   class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">

                    <i class="bi bi-grid-3x3-gap-fill"></i>

                    <span>Data Meja</span>

                </a>

            </li>

        @endif
{{-- Data Menu (TAMBAHKAN DI SINI - Hanya Kasir) --}}
    @if(auth()->user()->role === 'kasir')
        <a href="{{ route('menus.index') }}" class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
            <i class="bi bi-journal-text"></i>
            <span>Data Menu</span>
        </a>
    @endif

        {{-- PEMESANAN --}}
        @if(in_array(auth()->user()->role, ['kasir', 'staff_dapur', 'manager']))

            <li>

                <a href="{{ route('pemesanans.index') }}"
                   class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}">

                    <i class="bi bi-receipt-cutoff"></i>

                    <span>Pemesanan</span>

                </a>

            </li>

        @endif


        {{-- RESERVASI --}}
        @if(in_array(auth()->user()->role, ['kasir', 'manager']))

            <li>

                <a href="{{ route('reservasis.index') }}"
                   class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">

                    <i class="bi bi-calendar-check-fill"></i>

                    <span>Reservasi</span>

                </a>

            </li>

        @endif


        {{-- LAPORAN --}}
        @if(auth()->user()->role === 'manager')

            <li>

                <a href="{{ route('laporan.index') }}"
                   class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">

                    <i class="bi bi-bar-chart-fill"></i>

                    <span>Laporan</span>

                </a>

            </li>

        @endif

    </ul>


    {{-- LOGOUT --}}
    <div class="sidebar-bottom">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout-button">

                <i class="bi bi-box-arrow-left"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</div>


{{-- =====================================================
     MAIN CONTENT
===================================================== --}}

<div class="main-content">


    {{-- TOPBAR --}}
    <div class="topbar">

        <div class="user-profile">

            <div class="user-avatar">

                <i class="bi bi-person-fill"></i>

            </div>

            <div class="user-info">

                <div class="user-name">
                    {{ auth()->user()->nama }}
                </div>

                <div class="user-role">
                    {{ str_replace('_', ' ', auth()->user()->role) }}
                </div>

            </div>

        </div>

    </div>


    {{-- PAGE CONTENT --}}
    <div class="page-content">


        {{-- HEADER HALAMAN --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="page-title">
                    Data Pemesanan
                </h2>

                <p class="page-subtitle">
                    Kelola seluruh pemesanan pelanggan CafeKita
                </p>

            </div>


            <a href="{{ route('pemesanans.create') }}"
               class="btn btn-cafe">

                <i class="bi bi-plus-lg me-1"></i>

                Pemesanan Baru

            </a>

        </div>


        {{-- =================================================
             ALERT
        ================================================== --}}

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show mb-4">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show mb-4">

                <i class="bi bi-exclamation-circle-fill me-2"></i>

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- =================================================
             STATISTIK
        ================================================== --}}

        <div class="row g-3 mb-4">


            {{-- TOTAL PEMESANAN --}}
            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="card-body p-4">

                        <div class="stat-icon">

                            <i class="bi bi-receipt"></i>

                        </div>

                        <div class="stat-number">

                            {{ $pemesanans->count() }}

                        </div>

                        <div class="stat-label">

                            Total Pemesanan

                        </div>

                    </div>

                </div>

            </div>


            {{-- PEMESANAN PENDING --}}
            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="card-body p-4">

                        <div class="stat-icon">

                            <i class="bi bi-clock-history"></i>

                        </div>

                        <div class="stat-number text-warning">

                            {{ $pemesanans->where('status', 'pending')->count() }}

                        </div>

                        <div class="stat-label">

                            Pemesanan Pending

                        </div>

                    </div>

                </div>

            </div>


            {{-- PEMESANAN SELESAI --}}
            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="card-body p-4">

                        <div class="stat-icon">

                            <i class="bi bi-check-circle"></i>

                        </div>

                        <div class="stat-number text-success">

                            {{ $pemesanans->where('status', 'selesai')->count() }}

                        </div>

                        <div class="stat-label">

                            Pemesanan Selesai

                        </div>

                    </div>

                </div>

            </div>


            {{-- PENDAPATAN --}}
            <div class="col-xl-3 col-md-6">

                <div class="stat-card">

                    <div class="card-body p-4">

                        <div class="stat-icon">

                            <i class="bi bi-cash-stack"></i>

                        </div>

                        <div class="stat-number"
                             style="font-size:20px;">

                            Rp {{ number_format($pemesanans->where('status', 'selesai')->sum('total_bayar'), 0, ',', '.') }}

                        </div>

                        <div class="stat-label">

                            Total Pendapatan

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             TABEL PEMESANAN
        ================================================== --}}

        <div class="table-card">


            {{-- HEADER CARD --}}
            <div class="table-card-header">

                <div>

                    <h5 class="table-card-title">

                        <i class="bi bi-list-ul me-2"></i>

                        Daftar Pemesanan

                    </h5>

                    <div class="table-card-subtitle">

                        Data pemesanan pelanggan CafeKita

                    </div>

                </div>

                <span class="badge rounded-pill"
                      style="background:#edf3ee; color:#304e3a;">

                    {{ $pemesanans->count() }} Data

                </span>

            </div>


            {{-- TABLE --}}
            <div class="table-card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>

                        <tr>

                            <th>No</th>

                            <th>No. Pemesanan</th>

                            <th>Pelanggan</th>

                            <th>Meja</th>

                            <th>Kasir</th>

                            <th>Total</th>

                            <th>Status</th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                        </thead>


                        <tbody>


                        @forelse($pemesanans as $index => $pemesanan)

                            <tr>


                                {{-- NOMOR --}}
                                <td>

                                    <span class="text-muted">

                                        {{ $index + 1 }}

                                    </span>

                                </td>


                                {{-- NOMOR PEMESANAN --}}
                                <td>

                                    <div class="transaction-number">

                                        {{ $pemesanan->nomor_transaksi }}

                                    </div>

                                </td>


                                {{-- PELANGGAN --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $pemesanan->nama_pelanggan }}

                                    </div>

                                </td>


                                {{-- MEJA --}}
                                <td>

                                    @if($pemesanan->meja)

                                        <span class="badge rounded-pill"
                                              style="background:#edf3ee; color:#304e3a;">

                                            <i class="bi bi-grid-3x3-gap me-1"></i>

                                            {{ $pemesanan->meja->nomor_meja }}

                                        </span>

                                    @else

                                        -

                                    @endif

                                </td>
                    
                                {{-- KASIR --}}
                                <td>

                                    @if($pemesanan->user)

                                        <div class="d-flex align-items-center gap-2">

                                            <div
                                                style="
                                                    width:30px;
                                                    height:30px;
                                                    border-radius:50%;
                                                    background:#edf3ee;
                                                    color:#304e3a;
                                                    display:flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                ">

                                                <i class="bi bi-person"></i>

                                            </div>

                                            <span>

                                                {{ $pemesanan->user->nama }}

                                            </span>

                                        </div>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- TOTAL --}}
                                <td>

                                    <span class="total-bayar">

                                        Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}

                                    </span>

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if($pemesanan->status === 'selesai')

                                        <span class="status-badge bg-success-subtle text-success">

                                            <i class="bi bi-check-circle me-1"></i>

                                            Selesai

                                        </span>


                                    @elseif($pemesanan->status === 'batal')

                                        <span class="status-badge bg-danger-subtle text-danger">

                                            <i class="bi bi-x-circle me-1"></i>

                                            Batal

                                        </span>


                                    @elseif($pemesanan->status === 'diproses')

                                        <span class="status-badge bg-primary-subtle text-primary">

                                            <i class="bi bi-arrow-repeat me-1"></i>

                                            Diproses

                                        </span>


                                    @else

                                        <span class="status-badge bg-warning-subtle text-warning-emphasis">

                                            <i class="bi bi-clock me-1"></i>

                                            Pending

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-1">


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('pemesanans.edit', $pemesanan->id) }}"
                                            class="btn-action btn-edit"
                                            title="Edit Pemesanan">

                                            <i class="bi bi-pencil-fill"></i>

                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('pemesanans.destroy', $pemesanan->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus pemesanan ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus Pemesanan">

                                                <i class="bi bi-trash-fill"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="8">

                                    <div class="text-center py-5">

                                        <div class="empty-icon">

                                            <i class="bi bi-receipt"></i>

                                        </div>

                                        <h6 class="fw-bold">

                                            Belum Ada Pemesanan

                                        </h6>

                                        <p class="text-muted small mb-3">

                                            Belum terdapat data pemesanan CafeKita.

                                        </p>

                                        <a
                                            href="{{ route('pemesanans.create') }}"
                                            class="btn btn-cafe btn-sm">

                                            <i class="bi bi-plus-lg me-1"></i>

                                            Tambah Pemesanan

                                        </a>

                                    </div>

                                </td>

                            </tr>


                        @endforelse


                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- FOOTER --}}
        <div class="text-center mt-4">

            <small class="text-muted">

                © {{ date('Y') }} CafeKita Management System

            </small>

        </div>


    </div>

</div>


{{-- Bootstrap JS --}}
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
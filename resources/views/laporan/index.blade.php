<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{--hijau:#304e3a;--hijau-tua:#243e2e;--hijau-muda:#edf3ee;--gold:#d9b56d;--bg:#f5f7f5}
        *{box-sizing:border-box}
        body{margin:0;background:var(--bg);font-family:"Segoe UI",Arial,sans-serif;color:#333}

        .sidebar{position:fixed;left:0;top:0;bottom:0;width:250px;background:var(--hijau);padding:25px 18px;color:white;z-index:1000}
        .brand{display:flex;align-items:center;gap:12px;padding:0 12px;margin-bottom:35px}
        .brand-icon{width:45px;height:45px;border-radius:13px;background:rgba(217,181,109,.15);color:var(--gold);display:flex;align-items:center;justify-content:center;font-size:24px}
        .brand h4{margin:0;font-weight:700;letter-spacing:.5px}
        .brand small{color:rgba(255,255,255,.65);font-size:11px}
        .menu-title{font-size:11px;text-transform:uppercase;color:rgba(255,255,255,.45);margin:0 12px 10px;letter-spacing:1px}
        .sidebar-menu{list-style:none;padding:0;margin:0}
        .sidebar-menu li{margin-bottom:6px}
        .sidebar-menu a,.logout-button{width:100%;display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:12px;color:rgba(255,255,255,.78);text-decoration:none;border:none;background:transparent;transition:.2s;font-size:14px}
        .sidebar-menu a i,.logout-button i{font-size:18px;width:22px;text-align:center}
        .sidebar-menu a:hover,.logout-button:hover{background:rgba(255,255,255,.08);color:white}
        .sidebar-menu a.active{background:rgba(255,255,255,.12);color:white;border-left:4px solid var(--gold);padding-left:10px}
        .sidebar-bottom{position:absolute;bottom:20px;left:18px;right:18px}

        .main-content{margin-left:250px;min-height:100vh}
        .topbar{height:75px;background:white;border-bottom:1px solid #e9ecef;display:flex;justify-content:flex-end;align-items:center;padding:0 35px}
        .user-profile{display:flex;align-items:center;gap:12px}
        .user-avatar{width:42px;height:42px;border-radius:50%;background:var(--hijau-muda);color:var(--hijau);display:flex;align-items:center;justify-content:center;font-size:19px}
        .user-info{line-height:1.2}
        .user-name{font-weight:600;font-size:14px}
        .user-role{font-size:11px;color:#8a8a8a;text-transform:uppercase}

        .page-content{padding:30px 35px}
        .page-title{color:var(--hijau);font-weight:700;margin-bottom:5px}
        .page-subtitle{color:#888;margin-bottom:0}

        .filter-card,.stat-card,.table-card{background:white;border:none;border-radius:18px;box-shadow:0 5px 20px rgba(35,54,41,.06)}
        .filter-card{padding:22px}
        .filter-title{font-size:16px;font-weight:700;color:var(--hijau)}

        .btn-cafe{background:var(--hijau);color:white;border:none;border-radius:11px;padding:10px 16px;font-weight:500}
        .btn-cafe:hover{background:var(--hijau-tua);color:white}
        .btn-reset{background:#f0f1f1;color:#555;border:none;border-radius:11px;padding:10px 16px}
        .btn-reset:hover{background:#ddd}

        .form-control{border-radius:10px;border:1px solid #dee2e6;padding:10px 12px}
        .form-control:focus{border-color:var(--hijau);box-shadow:0 0 0 .2rem rgba(48,78,58,.1)}

        .stat-card{height:100%;transition:.2s}
        .stat-card:hover{transform:translateY(-2px)}
        .stat-icon{width:45px;height:45px;border-radius:13px;background:var(--hijau-muda);color:var(--hijau);display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:12px}
        .stat-number{font-size:24px;font-weight:700;color:var(--hijau);margin-bottom:2px}
        .stat-label{color:#888;font-size:13px}

        .table-card{overflow:hidden}
        .table-card-header{padding:20px 22px;border-bottom:1px solid #f0f0f0;display:flex;justify-content:space-between;align-items:center}
        .table-card-title{margin:0;font-size:17px;font-weight:700;color:var(--hijau)}
        .table-card-subtitle{color:#999;font-size:12px;margin-top:3px}
        .table-card-body{padding:0}

        .table{margin-bottom:0}
        .table thead th{background:#fafbfa;color:#777;font-size:12px;text-transform:uppercase;letter-spacing:.3px;font-weight:600;border-bottom:1px solid #eee;padding:15px 18px;white-space:nowrap}
        .table tbody td{padding:15px 18px;border-bottom:1px solid #f1f1f1;font-size:13px;color:#555}
        .table tbody tr:last-child td{border-bottom:none}
        .table tbody tr:hover{background:#fafcfb}

        .number-green{color:var(--hijau);font-weight:700}
        .money{color:var(--hijau);font-weight:700}
        .status-badge{padding:6px 11px;border-radius:20px;font-size:11px;font-weight:600}
        .alert{border:none;border-radius:13px}

        @media(max-width:991px){
            .sidebar{width:210px}
            .main-content{margin-left:210px}
            .page-content{padding:25px 20px}
            .topbar{padding:0 20px}
        }

        @media(max-width:768px){
            .sidebar{position:relative;width:100%;min-height:auto}
            .sidebar-bottom{position:relative;left:auto;right:auto;bottom:auto;margin-top:20px}
            .main-content{margin-left:0}
            .topbar{height:auto;padding:15px 20px}
            .page-content{padding:20px 15px}
        }
    </style>
</head>

<body>

<div class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-cup-hot-fill"></i>
        </div>
        <div>
            <h4>CafeKita</h4>
            <small>Management System</small>
        </div>
    </div>

    <div class="menu-title">Menu Utama</div>

<ul class="sidebar-menu">

    {{-- Dashboard (Semua Role) --}}
    <li>
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- Data Meja (Hanya Kasir) --}}
    @if(auth()->user()->role === 'kasir')
        <li>
            <a href="{{ route('mejas.index') }}"
               class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                <span>Data Meja</span>
            </a>
        </li>
    @endif
{{-- Data Menu (Hanya Kasir) --}}
@if(auth()->user()->role === 'kasir')
    <a href="{{ route('menus.index') }}" class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
        <i class="bi bi-journal-text"></i>
        <span>Data Menu</span>
    </a>
@endif
    {{-- Pemesanan (Kasir & Staf Dapur) --}}
    @if(in_array(auth()->user()->role, ['kasir', 'staff_dapur']))
        <li>
            <a href="{{ route('pemesanans.index') }}"
               class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Pemesanan</span>
            </a>
        </li>
    @endif

    {{-- Reservasi (Hanya Kasir) --}}
    @if(auth()->user()->role === 'kasir')
        <li>
            <a href="{{ route('reservasis.index') }}"
               class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Reservasi</span>
            </a>
        </li>
    @endif

    {{-- Laporan (Khusus Manager) --}}
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


<div class="main-content">

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
                    {{ str_replace('_',' ',auth()->user()->role) }}
                </div>
            </div>

        </div>
    </div>


    <div class="page-content">

        {{-- HEADER --}}
        <div class="mb-4">
            <h2 class="page-title">Laporan</h2>
            <p class="page-subtitle">
                Laporan transaksi dan reservasi CafeKita
            </p>
        </div>


        {{-- FILTER --}}
        <div class="filter-card mb-4">

            <div class="filter-title mb-3">
                <i class="bi bi-funnel-fill me-2"></i>
                Filter Laporan
            </div>

            <form action="{{ route('laporan.index') }}" method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label small fw-semibold">
                            Tanggal Mulai
                        </label>

                        <input type="date"
                               name="tanggal_mulai"
                               class="form-control"
                               value="{{ $tanggalMulai }}">

                    </div>

                    <div class="col-md-4">

                        <label class="form-label small fw-semibold">
                            Tanggal Selesai
                        </label>

                        <input type="date"
                               name="tanggal_selesai"
                               class="form-control"
                               value="{{ $tanggalSelesai }}">

                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit" class="btn btn-cafe">
                            <i class="bi bi-search me-1"></i>
                            Tampilkan
                        </button>

                        <a href="{{ route('laporan.index') }}"
                           class="btn btn-reset">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>


        {{-- STATISTIK --}}
        <div class="row g-3 mb-4">

            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="card-body p-4">

                        <div class="stat-icon">
                            <i class="bi bi-receipt"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahPemesanan }}
                        </div>

                        <div class="stat-label">
                            Jumlah Pemesanan
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="card-body p-4">

                        <div class="stat-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>

                        <div class="stat-number" style="font-size:20px;">
                            Rp {{ number_format($totalPendapatan,0,',','.') }}
                        </div>

                        <div class="stat-label">
                            Total Pendapatan
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="card-body p-4">

                        <div class="stat-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div class="stat-number">
                            {{ $jumlahReservasi }}
                        </div>

                        <div class="stat-label">
                            Jumlah Reservasi
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="card-body p-4">

                        <div class="stat-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>

                        <div class="stat-number">
                            {{ $reservasiSelesai }}
                        </div>

                        <div class="stat-label">
                            Reservasi Selesai
                        </div>

                    </div>
                </div>
            </div>

        </div>


        {{-- LAPORAN PEMESANAN --}}
        <div class="table-card mb-4">

            <div class="table-card-header">

                <div>
                    <h5 class="table-card-title">
                        <i class="bi bi-receipt me-2"></i>
                        Laporan Pemesanan
                    </h5>

                    <div class="table-card-subtitle">
                        Data pemesanan CafeKita
                    </div>
                </div>

                <span class="badge rounded-pill"
                      style="background:#edf3ee;color:#304e3a;">
                    {{ $pemesanans->count() }} Data
                </span>

            </div>


            <div class="table-card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Transaksi</th>
                                <th>Pelanggan</th>
                                <th>Meja</th>
                                <th>Kasir</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                       @forelse($pemesanans as $transaksi)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>
            <span class="number-green">
                {{ $transaksi->nomor_transaksi ?? $transaksi->nomor_pemesanan ?? '-' }}
            </span>
        </td>

        <td>
            <span class="fw-semibold">
                {{ $transaksi->nama_pelanggan }}
            </span>
        </td>
                                <td>
                                    @if($transaksi->meja)
                                        <span class="badge rounded-pill"
                                              style="background:#edf3ee;color:#304e3a;">
                                            <i class="bi bi-grid-3x3-gap me-1"></i>
                                            {{ $transaksi->meja->nomor_meja }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    {{ $transaksi->user->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $transaksi->tanggal_transaksi?->format('d-m-Y H:i') }}
                                </td>

                                <td>
                                    <span class="money">
                                        Rp {{ number_format($transaksi->total_bayar,0,',','.') }}
                                    </span>
                                </td>

                                <td>

                                    @if($transaksi->status === 'selesai')

                                        <span class="status-badge bg-success-subtle text-success">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Selesai
                                        </span>

                                    @elseif($transaksi->status === 'pending')

                                        <span class="status-badge bg-warning-subtle text-warning-emphasis">
                                            <i class="bi bi-clock me-1"></i>
                                            Pending
                                        </span>

                                    @else

                                        <span class="status-badge bg-danger-subtle text-danger">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Batal
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">

                                    <i class="bi bi-receipt"
                                       style="font-size:35px;color:#d9b56d;"></i>

                                    <div class="mt-2 text-muted">
                                        Belum ada data transaksi.
                                    </div>

                                </td>
                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- LAPORAN RESERVASI --}}
        <div class="table-card">

            <div class="table-card-header">

                <div>
                    <h5 class="table-card-title">
                        <i class="bi bi-calendar-check me-2"></i>
                        Laporan Reservasi
                    </h5>

                    <div class="table-card-subtitle">
                        Data reservasi pelanggan CafeKita
                    </div>
                </div>

                <span class="badge rounded-pill"
                      style="background:#edf3ee;color:#304e3a;">
                    {{ $reservasis->count() }} Data
                </span>

            </div>


            <div class="table-card-body">

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Reservasi</th>
                                <th>Pelanggan</th>
                                <th>Meja</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Orang</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($reservasis as $reservasi)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="number-green">
                                        {{ $reservasi->nomor_reservasi }}
                                    </span>
                                </td>

                                <td>
                                    <span class="fw-semibold">
                                        {{ $reservasi->nama_pelanggan }}
                                    </span>
                                </td>

                                <td>
                                    @if($reservasi->meja)
                                        <span class="badge rounded-pill"
                                              style="background:#edf3ee;color:#304e3a;">
                                            <i class="bi bi-grid-3x3-gap me-1"></i>
                                            {{ $reservasi->meja->nomor_meja }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    {{ $reservasi->tanggal_reservasi?->format('d-m-Y') }}
                                </td>

                                <td>
                                    <i class="bi bi-clock me-1 text-muted"></i>
                                    {{ $reservasi->jam_reservasi }}
                                </td>

                                <td>
                                    {{ $reservasi->jumlah_orang }} orang
                                </td>

                                <td>

                                    @if($reservasi->status === 'pending')

                                        <span class="status-badge bg-warning-subtle text-warning-emphasis">
                                            <i class="bi bi-clock me-1"></i>
                                            Pending
                                        </span>

                                    @elseif($reservasi->status === 'dikonfirmasi')

                                        <span class="status-badge bg-primary-subtle text-primary">
                                            <i class="bi bi-check2-circle me-1"></i>
                                            Dikonfirmasi
                                        </span>

                                    @elseif($reservasi->status === 'selesai')

                                        <span class="status-badge bg-success-subtle text-success">
                                            <i class="bi bi-check-circle me-1"></i>
                                            Selesai
                                        </span>

                                    @else

                                        <span class="status-badge bg-danger-subtle text-danger">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Dibatalkan
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center py-5">

                                    <i class="bi bi-calendar-x"
                                       style="font-size:35px;color:#d9b56d;"></i>

                                    <div class="mt-2 text-muted">
                                        Belum ada data reservasi.
                                    </div>

                                </td>
                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <div class="text-center mt-4">
            <small class="text-muted">
                © {{ date('Y') }} CafeKita Management System
            </small>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
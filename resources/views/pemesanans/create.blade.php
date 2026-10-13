<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Baru - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        /* SIDEBAR */
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
            overflow-y: auto;
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

        .brand h4 span {
            color: var(--gold);
        }

        .brand small {
            color: rgba(255, 255, 255, 0.65);
            font-size: 11px;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
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
            color: rgba(255, 255, 255, 0.78);
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
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.12);
            color: white;
            border-left: 4px solid var(--gold);
            padding-left: 10px;
        }

        .sidebar-menu a.active i {
            color: var(--gold);
        }

        .sidebar-bottom {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

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
            display: block;
        }

        .user-role {
            font-size: 11px;
            color: #8a8a8a;
            text-transform: uppercase;
        }

        /* PAGE CONTENT & FORM */
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
            font-size: 13px;
        }

        .form-card {
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(35, 54, 41, 0.06);
            overflow: hidden;
            margin-top: 25px;
        }

        .form-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #f0f0f0;
        }

        .form-card-title {
            margin: 0;
            color: var(--hijau);
            font-size: 17px;
            font-weight: 700;
        }

        .form-card-subtitle {
            color: #999;
            font-size: 12px;
            margin-top: 3px;
        }

        .form-card-body {
            padding: 25px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 11px 13px;
            border: 1px solid #dee2e6;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--hijau);
            box-shadow: 0 0 0 0.2rem rgba(48, 78, 58, 0.1);
        }

        .btn-cafe {
            background: var(--hijau);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: .2s;
        }

        .btn-cafe:hover {
            background: var(--hijau-tua);
            color: white;
        }

        .btn-back {
            background: #f0f1f1;
            color: #555;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            transition: .2s;
        }

        .btn-back:hover {
            background: #ddd;
            color: #333;
        }

        .required {
            color: #dc3545;
        }

        .info-box {
            background: var(--hijau-muda);
            border-radius: 12px;
            padding: 14px 16px;
            color: var(--hijau);
            font-size: 13px;
        }

        @media(max-width: 991px) {
            .sidebar {
                width: 210px;
            }
            .main-content {
                margin-left: 210px;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
            .topbar {
                padding: 0 20px;
            }
            .page-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-cup-hot-fill"></i>
            </div>
            <div>
                <h4>Cafe<span>Kita</span></h4>
                <small>Sistem Informasi Cafe</small>
            </div>
        </div>

        <div class="menu-title">Menu Utama</div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if(auth()->check() && auth()->user()->role === 'kasir')
                <li>
                    <a href="{{ route('mejas.index') }}" class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                        <span>Data Meja</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('menus.index') }}" class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i>
                        <span>Data Menu</span>
                    </a>
                </li>
            @endif

            @if(auth()->check() && in_array(auth()->user()->role, ['kasir', 'staff_dapur']))
                <li>
                    <a href="{{ route('pemesanans.index') }}" class="{{ request()->routeIs('pemesanans.*') ? 'active' : '' }}">
                        <i class="bi bi-receipt-cutoff"></i>
                        <span>Pemesanan</span>
                    </a>
                </li>
            @endif

            @if(auth()->check() && auth()->user()->role === 'kasir')
                <li>
                    <a href="{{ route('reservasis.index') }}" class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span>Reservasi</span>
                    </a>
                </li>
            @endif

            @if(auth()->check() && auth()->user()->role === 'manager')
                <li>
                    <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
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
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- TOPBAR -->
        <header class="topbar">
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="user-info">
                    <span class="user-name">{{ auth()->check() ? auth()->user()->nama : 'Kasir CafeKita' }}</span>
                    <span class="user-role">{{ auth()->check() ? str_replace('_', ' ', auth()->user()->role) : 'Kasir' }}</span>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="page-title">Tambah Pemesanan</h2>
                    <p class="page-subtitle">Buat catatan pesanan baru untuk pelanggan di CafeKita</p>
                </div>
                <a href="{{ route('pemesanans.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <!-- CARD FORM -->
            <div class="form-card">
                <div class="form-card-header">
                    <h5 class="form-card-title">Formulir Pesanan</h5>
                    <p class="form-card-subtitle">Isi rincian meja dan pesanan di bawah ini dengan benar</p>
                </div>

                <div class="form-card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pemesanans.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <!-- Meja -->
                            <div class="col-md-6">
                                <label class="form-label">Pilih Meja <span class="required">*</span></label>
                                <select name="meja_id" class="form-select @error('meja_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Meja --</option>
                                    @if(isset($mejas))
                                        @foreach($mejas as $meja)
                                            <option value="{{ $meja->id }}" {{ old('meja_id') == $meja->id ? 'selected' : '' }}>
                                                Meja {{ $meja->nomor_meja ?? $meja->nomor }} (Kapasitas: {{ $meja->kapasitas }} Orang)
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('meja_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Pelanggan -->
                            <div class="col-md-6">
                                <label class="form-label">Nama Pelanggan <span class="required">*</span></label>
                                <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{ old('nama_pelanggan') }}" placeholder="Contoh: Budi Santoso" required>
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div class="col-12">
                                <label class="form-label">Catatan Pesanan (Opsional)</label>
                                <textarea name="catatan" rows="3" class="form-control" placeholder="Contoh: Kurangi gula, es batu dipisah, dll...">{{ old('catatan') }}</textarea>
                            </div>

                            <!-- Info Box -->
                            <div class="col-12">
                                <div class="info-box">
                                    <i class="bi bi-info-circle-fill me-1"></i> Setelah data pemesanan dibuat, Anda dapat menambahkan menu pesanan dan memproses pembayaran.
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="col-12 text-end pt-3">
                                <a href="{{ route('pemesanans.index') }}" class="btn-back me-2">Batal</a>
                                <button type="submit" class="btn-cafe">
                                    <i class="bi bi-save me-1"></i> Simpan Pemesanan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
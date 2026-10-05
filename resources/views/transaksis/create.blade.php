<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru - CafeKita</title>

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

        .form-card{background:white;border:none;border-radius:18px;box-shadow:0 5px 20px rgba(35,54,41,.06);overflow:hidden}
        .form-card-header{padding:20px 24px;border-bottom:1px solid #f0f0f0}
        .form-card-title{margin:0;color:var(--hijau);font-size:17px;font-weight:700}
        .form-card-subtitle{color:#999;font-size:12px;margin-top:3px}

        .form-card-body{padding:25px}
        .form-label{font-size:13px;font-weight:600;color:#555}
        .form-control,.form-select{border-radius:10px;padding:11px 13px;border:1px solid #dee2e6;font-size:14px}
        .form-control:focus,.form-select:focus{border-color:var(--hijau);box-shadow:0 0 0 .2rem rgba(48,78,58,.1)}

        .input-icon{position:relative}
        .input-icon i{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:#888}
        .input-icon .form-control{padding-left:40px}

        .btn-cafe{background:var(--hijau);color:white;border:none;border-radius:10px;padding:10px 17px;font-weight:500}
        .btn-cafe:hover{background:var(--hijau-tua);color:white}
        .btn-back{background:#f0f1f1;color:#555;border:none;border-radius:10px;padding:10px 17px}
        .btn-back:hover{background:#ddd;color:#333}

        .alert{border:none;border-radius:13px}
        .info-box{background:var(--hijau-muda);border-radius:12px;padding:14px 16px;color:var(--hijau);font-size:13px}
        .required{color:#dc3545}

        @media(max-width:991px){
            .sidebar{width:210px}.main-content{margin-left:210px}.page-content{padding:25px 20px}.topbar{padding:0 20px}
        }
        @media(max-width:768px){
            .sidebar{position:relative;width:100%;min-height:auto}
            .sidebar-bottom{position:relative;left:auto;right:auto;bottom:auto;margin-top:20px}
            .main-content{margin-left:0}.topbar{height:auto;padding:15px 20px}.page-content{padding:20px 15px}
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

        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(in_array(auth()->user()->role,['kasir','manager']))
            <li>
                <a href="{{ route('mejas.index') }}"
                   class="{{ request()->routeIs('mejas.*') ? 'active' : '' }}">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    <span>Data Meja</span>
                </a>
            </li>
        @endif

        @if(in_array(auth()->user()->role,['kasir','staff_dapur','manager']))
            <li>
                <a href="{{ route('transaksis.index') }}"
                   class="{{ request()->routeIs('transaksis.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>Transaksi</span>
                </a>
            </li>
        @endif

        @if(in_array(auth()->user()->role,['kasir','manager']))
            <li>
                <a href="{{ route('reservasis.index') }}"
                   class="{{ request()->routeIs('reservasis.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-check-fill"></i>
                    <span>Reservasi</span>
                </a>
            </li>
        @endif

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

        <div class="mb-4">

            <h2 class="page-title">
                Transaksi Baru
            </h2>

            <p class="page-subtitle">
                Tambahkan transaksi pelanggan CafeKita
            </p>

        </div>


        @if($errors->any())

            <div class="alert alert-danger mb-4">

                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Terdapat kesalahan pada data yang dimasukkan.

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-danger mb-4">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
            </div>

        @endif


        <div class="form-card">

            <div class="form-card-header">

                <h5 class="form-card-title">
                    <i class="bi bi-receipt-cutoff me-2"></i>
                    Form Transaksi
                </h5>

                <div class="form-card-subtitle">
                    Isi data transaksi pelanggan dengan lengkap
                </div>

            </div>


            <div class="form-card-body">

                <div class="info-box mb-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Silakan isi data pelanggan, pilih meja yang tersedia,
                    kemudian masukkan total pembayaran.
                </div>


                <form action="{{ route('transaksis.store') }}" method="POST">

                    @csrf


                    <div class="row g-4">

                        {{-- NAMA PELANGGAN --}}
                        <div class="col-md-6">

                            <label class="form-label">
                                Nama Pelanggan
                                <span class="required">*</span>
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-person-fill"></i>

                                <input type="text"
                                       name="nama_pelanggan"
                                       class="form-control"
                                       value="{{ old('nama_pelanggan') }}"
                                       placeholder="Masukkan nama pelanggan"
                                       required>

                            </div>

                        </div>


                        {{-- MEJA --}}
                        <div class="col-md-6">

                            <label class="form-label">
                                Meja
                                <span class="required">*</span>
                            </label>

                            <select name="meja_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Meja --
                                </option>

                                @foreach($mejas as $meja)

                                    <option value="{{ $meja->id }}"
                                        {{ old('meja_id') == $meja->id ? 'selected' : '' }}>

                                        Meja {{ $meja->nomor_meja }}
                                        - Kapasitas {{ $meja->kapasitas }} orang

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- TOTAL BAYAR --}}
                        <div class="col-md-6">

                            <label class="form-label">
                                Total Bayar
                                <span class="required">*</span>
                            </label>

                            <div class="input-icon">

                                <i class="bi bi-cash-stack"></i>

                                <input type="number"
                                       name="total_bayar"
                                       class="form-control"
                                       value="{{ old('total_bayar',0) }}"
                                       min="0"
                                       step="100"
                                       placeholder="Masukkan total pembayaran"
                                       required>

                            </div>

                            <small class="text-muted">
                                Masukkan nominal pembayaran dalam rupiah.
                            </small>

                        </div>

                    </div>


                    <hr class="my-4">


                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('transaksis.index') }}"
                           class="btn btn-back">

                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali

                        </a>

                        <button type="submit"
                                class="btn btn-cafe">

                            <i class="bi bi-check-lg me-1"></i>
                            Simpan Transaksi

                        </button>

                    </div>

                </form>

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
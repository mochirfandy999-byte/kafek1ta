<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu - CafeKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #f5f7f5; color: #202923; }
        .sidebar { position: fixed; top: 0; left: 0; width: 260px; height: 100vh; padding: 25px 18px; background: linear-gradient(160deg, #1f3929, #304e3a); color: white; z-index: 1000; }
        .sidebar-brand { display: flex; align-items: center; gap: 12px; padding: 5px 10px 30px; }
        .brand-icon { width: 48px; height: 48px; border-radius: 14px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.12); color: #d9b56d; font-size: 24px; }
        .brand-text h4 { margin: 0; font-size: 21px; font-weight: 800; }
        .brand-text h4 span { color: #d9b56d; }
        .sidebar-menu { display: flex; flex-direction: column; gap: 5px; }
        .sidebar-menu a { display: flex; align-items: center; gap: 13px; padding: 12px 14px; color: rgba(255,255,255,0.72); text-decoration: none; border-radius: 12px; font-size: 14px; }
        .sidebar-menu a.active { background: rgba(255,255,255,0.13); color: white; box-shadow: inset 3px 0 0 #d9b56d; }
        .main-content { margin-left: 260px; min-height: 100vh; padding: 25px 32px; }
        .stat-card { background: white; border-radius: 16px; padding: 20px; border: 1px solid #e9ede9; }
        .badge-makanan { background: #e8f5e9; color: #2e7d32; padding: 5px 10px; border-radius: 8px; font-size: 12px; font-weight: 600; }
        .badge-minuman { background: #e3f2fd; color: #1565c0; padding: 5px 10px; border-radius: 8px; font-size: 12px; font-weight: 600; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="bi bi-cup-hot-fill"></i></div>
            <div class="brand-text">
                <h4>Cafe<span>Kita</span></h4>
                <small>Management System</small>
            </div>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
            <a href="{{ route('mejas.index') }}"><i class="bi bi-grid-3x3-gap-fill"></i><span>Data Meja</span></a>
            <a href="{{ route('menus.index') }}" class="active"><i class="bi bi-journal-text"></i><span>Data Menu</span></a>
            <a href="{{ route('pemesanans.index') }}"><i class="bi bi-receipt-cutoff"></i><span>Pemesanan</span></a>
            <a href="{{ route('reservasis.index') }}"><i class="bi bi-calendar-check-fill"></i><span>Reservasi</span></a>
        </div>
    </aside>

    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Data Menu</h2>
                <p class="text-muted mb-0">Kelola daftar menu makanan dan minuman CafeKita</p>
            </div>
            <a href="{{ route('menus.create') }}" class="btn btn-success px-3 py-2 fw-semibold" style="background:#1f3929; border:none;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Menu
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Statistik Ringkasan --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted">Total Menu</small>
                    <h3 class="fw-bold mt-1 mb-0">{{ $totalMenu }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted">Makanan</small>
                    <h3 class="fw-bold mt-1 mb-0">{{ $totalMakanan }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <small class="text-muted">Minuman</small>
                    <h3 class="fw-bold mt-1 mb-0">{{ $totalMinuman }}</h3>
                </div>
            </div>
        </div>

        {{-- Tabel Daftar Menu --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-list-ul me-2"></i>Daftar Menu</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>NO</th>
                                <th>KODE MENU</th>
                                <th>NAMA MENU</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $menu->kode_menu }}</span></td>
                                    <td class="fw-semibold">{{ $menu->nama_menu }}</td>
                                    <td>
                                        <span class="{{ $menu->kategori == 'makanan' ? 'badge-makanan' : 'badge-minuman' }}">
                                            {{ ucfirst($menu->kategori) }}
                                        </span>
                                    </td>
                                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada menu yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
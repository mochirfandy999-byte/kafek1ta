<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reservasi - CafeKita</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f7f9f7;
            color: #2b2f32;
        }

        :root {
            --cafe-primary: #2d503f;
            --cafe-primary-hover: #223e31;
            --cafe-border: #e3e8e5;
        }

        .btn-cafe-primary {
            background-color: var(--cafe-primary);
            color: #ffffff;
            border: none;
            padding: 9px 22px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
        }

        .btn-cafe-primary:hover {
            background-color: var(--cafe-primary-hover);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-cafe-outline {
            border: 1.5px solid var(--cafe-primary);
            color: var(--cafe-primary);
            background: transparent;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-cafe-outline:hover {
            background-color: var(--cafe-primary);
            color: #ffffff;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid var(--cafe-border);
            padding: 9px 14px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--cafe-primary);
            box-shadow: 0 0 0 3px rgba(45, 80, 63, 0.15);
        }

        .form-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 6px;
        }

        .card-custom {
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, 0.04);
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .section-box {
            background-color: #fbfcfb;
            border: 1px solid var(--cafe-border);
            border-radius: 12px;
            padding: 18px;
        }

        .profile-pill {
            background: #ffffff;
            border: 1px solid var(--cafe-border);
            border-radius: 12px;
            padding: 6px 14px;
        }
    </style>
</head>

<body class="app-with-sidebar">
    @include('layouts.sidebar')

    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1" style="color: #1e2922;">Tambah Reservasi</h4>
                <p class="text-muted small mb-0">Kelola dan jadwalkan reservasi meja pelanggan CafeKita</p>
            </div>
            
            <div class="profile-pill d-flex align-items-center gap-2 shadow-sm">
                <div class="rounded-circle d-flex align-items-center justify-content-center bg-light" style="width: 36px; height: 36px;">
                    <i class="bi bi-person text-secondary"></i>
                </div>
                <div class="lh-1">
                    <span class="d-block fw-semibold" style="font-size: 0.85rem;">{{ auth()->user()->nama ?? auth()->user()->name ?? 'Kasir CafeKita' }}</span>
                    <span class="text-muted" style="font-size: 0.75rem;">{{ ucfirst(auth()->user()->role ?? 'Kasir') }}</span>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm mb-4" role="alert">
                <div class="fw-bold mb-1"><i class="bi bi-exclamation-circle-fill me-2"></i> Terdapat kesalahan pengisian:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom">
            <div class="card-body p-4 p-md-5">

                <form action="{{ route('reservasis.store') }}" method="POST">
                    @csrf

                    <h6 class="fw-bold mb-3" style="color: var(--cafe-primary);">
                        <i class="bi bi-person-lines-fill me-1"></i> Data Pemesan & Meja
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pelanggan <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_pelanggan"
                                   class="form-control"
                                   value="{{ old('nama_pelanggan') }}"
                                   placeholder="Masukkan nama pelanggan"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. HP / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   value="{{ old('no_hp') }}"
                                   placeholder="08xxxxxxxxxx"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Meja <span class="text-danger">*</span></label>
                            <select name="meja_id" class="form-select" required>
                                <option value="">-- Pilih Meja --</option>
                                @forelse ($mejas as $m)
                                    <option value="{{ $m->id }}" {{ old('meja_id') == $m->id ? 'selected' : '' }}>
                                        Meja {{ $m->nomor_meja }} (Kapasitas {{$m->kapasitas }} orang)
                                    </option>
                                @empty
                                    <option value="" disabled>Tidak ada meja tersedia</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Orang <span class="text-danger">*</span></label>
                            <input type="number"
                                   name="jumlah_orang"
                                   class="form-control"
                                   value="{{ old('jumlah_orang', 1) }}"
                                   min="1"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Tanggal Reservasi <span class="text-danger">*</span></label>
                            <input type="date"
                                   name="tanggal_reservasi"
                                   class="form-control"
                                   value="{{ old('tanggal_reservasi') }}"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jam Reservasi <span class="text-danger">*</span></label>
                            <input type="time"
                                   name="jam_reservasi"
                                   class="form-control"
                                   value="{{ old('jam_reservasi') }}"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="dikonfirmasi" {{ old('status') == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                    </div>

                    <div class="section-box mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <label class="form-label mb-0 fw-bold" style="color: var(--cafe-primary);">
                                    <i class="bi bi-cup-hot me-1"></i> Pesanan Menu (Opsional)
                                </label>
                                <p class="text-muted small mb-0">Menu pesanan yang ingin disiapkan sebelum pelanggan datang</p>
                            </div>
                            <button type="button" class="btn btn-sm btn-cafe-outline" id="btn-tambah-menu">
                                <i class="bi bi-plus-circle me-1"></i> Tambah Menu
                            </button>
                        </div>

                        <div id="container-menu">
                            <div class="row g-2 align-items-center mb-2 baris-menu">
                                <div class="col-7 col-md-8">
                                    <select name="menus[0][id]" class="form-select select-menu">
                                        <option value="">-- Pilih Menu Makanan / Minuman --</option>
                                        @if(isset($menus))
                                            @forelse ($menus as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_menu ?? $item->nama }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                </option>
                                            @empty
                                            @endforelse
                                        @endif
                                    </select>
                                </div>

                                <div class="col-3 col-md-3">
                                    <input type="number"
                                           name="menus[0][jumlah]"
                                           class="form-control input-qty"
                                           placeholder="Qty"
                                           min="1"
                                           value="1">
                                </div>

                                <div class="col-2 col-md-1">
                                    <button type="button" class="btn btn-outline-danger w-100 btn-hapus-menu" disabled>
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label"><i class="bi bi-card-text me-1"></i> Keterangan</label>
                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Keterangan tambahan atau catatan khusus meja...">{{ old('keterangan') }}</textarea>
                    </div>

                    <hr class="my-4" style="border-color: var(--cafe-border);">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('reservasis.index') }}" class="btn btn-light border px-4 py-2" style="border-radius: 10px; font-weight: 500;">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-cafe-primary px-4 py-2">
                            <i class="bi bi-floppy me-1"></i> Simpan Reservasi
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let menuIndex = 1;

        document.getElementById('btn-tambah-menu').addEventListener('click', function () {
            const container = document.getElementById('container-menu');
            const barisPertama = container.querySelector('.baris-menu');
            const barisBaru = barisPertama.cloneNode(true);

            const selectMenu = barisBaru.querySelector('.select-menu');
            selectMenu.name = `menus[${menuIndex}][id]`;
            selectMenu.selectedIndex = 0;

            const inputQty = barisBaru.querySelector('.input-qty');
            inputQty.name = `menus[${menuIndex}][jumlah]`;
            inputQty.value = 1;

            const tombolHapus = barisBaru.querySelector('.btn-hapus-menu');
            tombolHapus.disabled = false;
            tombolHapus.addEventListener('click', function () {
                barisBaru.remove();
            });

            container.appendChild(barisBaru);
            menuIndex++;
        });
    </script>
</body>

</html>
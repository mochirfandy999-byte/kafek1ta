<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reservasi - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

<div class="container py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-4">
                📅 Tambah Reservasi
            </h3>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach($errors->all() as$err): ?>
                            <li>{{ $err }}</li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservasis.store') }}" method="POST">
                @csrf

                <div class="row">

                    {{-- NAMA PELANGGAN --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text"
                               name="nama_pelanggan"
                               class="form-control"
                               value="{{ old('nama_pelanggan') }}"
                               placeholder="Masukkan nama pelanggan"
                               required>
                    </div>

                    {{-- NO HP --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text"
                               name="no_hp"
                               class="form-control"
                               value="{{ old('no_hp') }}"
                               placeholder="08xxxxxxxxxx"
                               required>
                    </div>

                    {{-- MEJA --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meja</label>
                        <select name="meja_id" class="form-select" required>
                            <option value="">-- Pilih Meja --</option>
                            <?php if(isset($mejas)): ?>
                                <?php foreach($mejas as$m): ?>
                                    <option value="{{ $m->id }}" {{ old('meja_id') == $m->id ? 'selected' : '' }}>
                                        Meja {{ $m->nomor_meja }} - Kapasitas {{$m->kapasitas }} orang
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    {{-- JUMLAH ORANG --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jumlah Orang</label>
                        <input type="number"
                               name="jumlah_orang"
                               class="form-control"
                               value="{{ old('jumlah_orang', 1) }}"
                               min="1"
                               required>
                    </div>

                    {{-- TANGGAL RESERVASI --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Reservasi</label>
                        <input type="date"
                               name="tanggal_reservasi"
                               class="form-control"
                               value="{{ old('tanggal_reservasi') }}"
                               required>
                    </div>

                    {{-- JAM RESERVASI --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Reservasi</label>
                        <input type="time"
                               name="jam_reservasi"
                               class="form-control"
                               value="{{ old('jam_reservasi') }}"
                               required>
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="pending">Pending</option>
                            <option value="dikonfirmasi">Dikonfirmasi</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                    </div>

                    {{-- PILIH MENU --}}
                    <div class="col-12 mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Pesanan Menu (Opsional)</span>
                            <button type="button" class="btn btn-sm btn-outline-success" id="btn-tambah-menu">
                                <i class="bi bi-plus-circle"></i> Tambah Menu
                            </button>
                        </label>

                        <div id="container-menu">
                            <div class="row g-2 align-items-center mb-2 baris-menu">
                                <div class="col-7 col-md-8">
                                    <select name="menus[0][id]" class="form-select select-menu">
                                        <option value="">-- Pilih Menu Makanan / Minuman --</option>
                                        <?php if(isset($menus)): ?>
                                            <?php foreach($menus as$item): ?>
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nama_menu ?? $item->nama }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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

                    {{-- KETERANGAN --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Keterangan tambahan...">{{ old('keterangan') }}</textarea>
                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('reservasis.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Reservasi
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
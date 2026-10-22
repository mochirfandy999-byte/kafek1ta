<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f7f9f8;
            color: #2d3748;
        }

        .brand-icon-box {
            width: 48px;
            height: 48px;
            background-color: #20402c;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #d69e2e;
            font-size: 1.5rem;
        }

        .form-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #edf2f7;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04);
            max-width: 580px;
            width: 100%;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 0.6rem 0.85rem;
            font-size: 0.9rem;
            color: #2d3748;
        }

        .form-control::placeholder {
            color: #a0aec0;
            font-size: 0.875rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #2d5a3f;
            box-shadow: 0 0 0 3px rgba(45, 90, 63, 0.12);
        }

        .btn-submit-cafe {
            background-color: #1a3826;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 0.55rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .btn-submit-cafe:hover {
            background-color: #12281b;
            color: #ffffff;
        }

        .btn-back-cafe {
            background-color: #edf2f7;
            color: #4a5568;
            border: none;
            border-radius: 10px;
            padding: 0.55rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .btn-back-cafe:hover {
            background-color: #e2e8f0;
            color: #2d3748;
        }
    </style>
</head>

<body class="d-flex min-vh-100">

    @include('layouts.sidebar')

    {{-- Konten Utama Tengah --}}
    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center py-5 px-3">

        {{-- Logo & Judul CafeKita --}}
        <div class="text-center mb-4">
            <div class="brand-icon-box shadow-sm mb-2">
                <i class="bi bi-cup-hot-fill"></i>
            </div>
            <h5 class="fw-bold mb-1" style="color: #1a3826; letter-spacing: -0.3px;">CafeKita</h5>
            <p class="text-muted small mb-0">Tambah Data Meja Baru</p>
        </div>

        {{-- Kartu Form --}}
        <div class="form-card p-4 p-md-4">

            {{-- Error Validasi --}}
            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 rounded-3 small mb-3 border-0">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mejas.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    {{-- Nomor Meja --}}
                    <div class="col-sm-6">
                        <label class="form-label">
                            <i class="bi bi-qr-code text-muted"></i> Nomor Meja
                        </label>
                        <input type="text"
                               name="nomor_meja"
                               class="form-control"
                               placeholder="Contoh: M01"
                               value="{{ old('nomor_meja') }}"
                               required>
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6">
                        <label class="form-label">
                            <i class="bi bi-tag text-muted"></i> Status Meja
                        </label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="terisi" {{ old('status') == 'terisi' ? 'selected' : '' }}>Dine in (Terisi)</option>
                            <option value="reservasi" {{ old('status') == 'reservasi' ? 'selected' : '' }}>Reservasi</option>
                        </select>
                    </div>

                    {{-- Kapasitas --}}
                    <div class="col-12">
                        <label class="form-label">
                            <i class="bi bi-people text-muted"></i> Kapasitas Kursi
                        </label>
                        <div class="input-group">
                            <input type="number"
                                   name="kapasitas"
                                   class="form-control"
                                   placeholder="Contoh: 4"
                                   value="{{ old('kapasitas') }}"
                                   min="1"
                                   required>
                            <span class="input-group-text bg-light text-muted small border-start-0" style="border-radius: 0 10px 10px 0;">Orang</span>
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="col-12">
                        <label class="form-label">
                            <i class="bi bi-card-text text-muted"></i> Keterangan Meja
                        </label>
                        <input type="text"
                               name="keterangan"
                               class="form-control"
                               placeholder="Masukkan keterangan (cth: Smoking area, dekat stopkontak)"
                               value="{{ old('keterangan') }}">
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-2">
                    <a href="{{ route('mejas.index') }}" class="btn btn-back-cafe text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-submit-cafe">
                        <i class="bi bi-floppy-fill me-1"></i> Simpan Meja
                    </button>
                </div>

            </form>
        </div>

    </main>

</body>
</html>
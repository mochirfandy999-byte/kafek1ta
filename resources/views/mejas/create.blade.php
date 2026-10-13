<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Meja - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Meja</h4>
        </div>

        <div class="card-body">

            {{-- Error validasi --}}
            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>Periksa kembali data:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('mejas.store') }}" method="POST">

                @csrf

                {{-- Nomor Meja --}}
                <div class="mb-3">

                    <label class="form-label">
                        Nomor Meja
                    </label>

                    <input type="text"
                           name="nomor_meja"
                           class="form-control"
                           placeholder="Contoh: M01"
                           value="{{ old('nomor_meja') }}"
                           required>

                </div>

                {{-- Kapasitas --}}
                <div class="mb-3">

                    <label class="form-label">
                        Kapasitas
                    </label>

                    <input type="number"
                           name="kapasitas"
                           class="form-control"
                           placeholder="Contoh: 4"
                           value="{{ old('kapasitas') }}"
                           min="1"
                           required>

                </div>

                {{-- Status --}}
                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Status --</option>

                        <option value="tersedia"
                            {{ old('status') == 'Reservasi' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="terisi"
                            {{ old('status') == 'Dine in' ? 'selected' : '' }}>
                            Dine in 
                        </option>

                    </select>

                </div>

                {{-- Keterangan --}}
                <div class="mb-3">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="3"
                              placeholder="Keterangan tambahan">{{ old('keterangan') }}</textarea>

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('mejas.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Meja - CafeKita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light app-with-sidebar">
@include('layouts.sidebar')

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Data Meja</h4>
        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('mejas.update', $meja->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Nomor Meja --}}
                <div class="mb-3">

                    <label class="form-label">
                        Nomor Meja
                    </label>

                    <input type="text"
                           name="nomor_meja"
                           class="form-control"
                           value="{{ old('nomor_meja', $meja->nomor_meja) }}"
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
                           value="{{ old('kapasitas', $meja->kapasitas) }}"
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

                        <option value="tersedia"
                            {{ old('status', $meja->status) == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="terisi"
                            {{ old('status', $meja->status) == 'terisi' ? 'selected' : '' }}>
                            Terisi
                        </option>

                        <option value="reservasi"
                            {{ old('status', $meja->status) == 'reservasi' ? 'selected' : '' }}>
                            Reservasi
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
                              rows="3">{{ old('keterangan', $meja->keterangan) }}</textarea>

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('mejas.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-warning">
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
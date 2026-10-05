<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Reservasi - CafeKita</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

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

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('reservasis.store') }}"
                  method="POST">

                @csrf


                <div class="row">


                    {{-- NAMA --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama Pelanggan
                        </label>

                        <input
                            type="text"
                            name="nama_pelanggan"
                            class="form-control"
                            value="{{ old('nama_pelanggan') }}"
                            placeholder="Masukkan nama pelanggan"
                            required>

                    </div>


                    {{-- NO HP --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            No. HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            value="{{ old('no_hp') }}"
                            placeholder="08xxxxxxxxxx"
                            required>

                    </div>


                    {{-- MEJA --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Meja
                        </label>

                        <select name="meja_id"
                                class="form-select"
                                required>

                            <option value="">
                                -- Pilih Meja --
                            </option>

                            @foreach($mejas as $meja)

                                <option
                                    value="{{ $meja->id }}"
                                    {{ old('meja_id') == $meja->id ? 'selected' : '' }}>

                                    Meja {{ $meja->nomor_meja }}
                                    - Kapasitas {{ $meja->kapasitas }} orang

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- JUMLAH ORANG --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jumlah Orang
                        </label>

                        <input
                            type="number"
                            name="jumlah_orang"
                            class="form-control"
                            value="{{ old('jumlah_orang', 1) }}"
                            min="1"
                            required>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Reservasi
                        </label>

                        <input
                            type="date"
                            name="tanggal_reservasi"
                            class="form-control"
                            value="{{ old('tanggal_reservasi') }}"
                            required>

                    </div>


                    {{-- JAM --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jam Reservasi
                        </label>

                        <input
                            type="time"
                            name="jam_reservasi"
                            class="form-control"
                            value="{{ old('jam_reservasi') }}"
                            required>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="pending">
                                Pending
                            </option>

                            <option value="dikonfirmasi">
                                Dikonfirmasi
                            </option>

                            <option value="selesai">
                                Selesai
                            </option>

                            <option value="dibatalkan">
                                Dibatalkan
                            </option>

                        </select>

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="form-control"
                            rows="3"
                            placeholder="Keterangan tambahan...">{{ old('keterangan') }}</textarea>

                    </div>

                </div>


                <div class="mt-3">

                    <a href="{{ route('reservasis.index') }}"
                       class="btn btn-secondary">

                        ← Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        💾 Simpan Reservasi

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>
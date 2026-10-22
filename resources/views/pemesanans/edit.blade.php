<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Pemesanan - CafeKita</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light app-with-sidebar">
@include('layouts.sidebar')

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Edit Pemesanan
            </h4>

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


            <form
                action="{{ route('pemesanans.update', $pemesanan->id) }}"
                method="POST">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Nomor Pemesanan
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $pemesanan->nomor_transaksi }}"
                        readonly>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Nama Pelanggan
                    </label>

                    <input
                        type="text"
                        name="nama_pelanggan"
                        class="form-control"
                        value="{{ old('nama_pelanggan', $pemesanan->nama_pelanggan) }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Meja
                    </label>

                    <select name="meja_id"
                            class="form-select"
                            required>

                        @foreach($mejas as $meja)

                            <option
                                value="{{ $meja->id }}"
                                {{ old('meja_id', $pemesanan->meja_id) == $meja->id ? 'selected' : '' }}>

                                Meja {{ $meja->nomor_meja }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Total Bayar
                    </label>

                    <input
                        type="number"
                        name="total_bayar"
                        class="form-control"
                        value="{{ old('total_bayar', $pemesanan->total_bayar) }}"
                        min="0"
                        step="100"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="pending"
                            {{ $pemesanan->status === 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="selesai"
                            {{ $pemesanan->status === 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="batal"
                            {{ $pemesanan->status === 'batal' ? 'selected' : '' }}>
                            Batal
                        </option>

                    </select>

                </div>


                <div class="d-flex gap-2">

                    <a href="{{ route('pemesanans.index') }}"
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
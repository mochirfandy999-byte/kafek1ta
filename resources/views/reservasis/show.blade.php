<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Detail Reservasi - CafeKita</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h3 class="fw-bold mb-0">
                    📅 Detail Reservasi
                </h3>

                <span class="badge bg-primary fs-6">
                    {{ $reservasi->nomor_reservasi }}
                </span>

            </div>


            <div class="row">


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Nama Pelanggan
                    </label>

                    <h5>
                        {{ $reservasi->nama_pelanggan }}
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        No. HP
                    </label>

                    <h5>
                        {{ $reservasi->no_hp }}
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Meja
                    </label>

                    <h5>
                        Meja {{ $reservasi->meja->nomor_meja }}
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Kapasitas Meja
                    </label>

                    <h5>
                        {{ $reservasi->meja->kapasitas }} orang
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Tanggal Reservasi
                    </label>

                    <h5>
                        {{ $reservasi->tanggal_reservasi->format('d-m-Y') }}
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Jam Reservasi
                    </label>

                    <h5>
                        {{ $reservasi->jam_reservasi }}
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Jumlah Orang
                    </label>

                    <h5>
                        {{ $reservasi->jumlah_orang }} orang
                    </h5>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        Status
                    </label>

                    <h5>

                        @if($reservasi->status === 'pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif($reservasi->status === 'dikonfirmasi')

                            <span class="badge bg-primary">
                                Dikonfirmasi
                            </span>

                        @elseif($reservasi->status === 'selesai')

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Dibatalkan
                            </span>

                        @endif

                    </h5>

                </div>


                <div class="col-12 mb-3">

                    <label class="text-muted">
                        Keterangan
                    </label>

                    <p class="border rounded p-3 bg-light">

                        {{ $reservasi->keterangan ?: '-' }}

                    </p>

                </div>

            </div>


            <div class="mt-3">

                <a href="{{ route('reservasis.index') }}"
                   class="btn btn-secondary">

                    ← Kembali

                </a>

                <a href="{{ route('reservasis.edit', $reservasi) }}"
                   class="btn btn-warning">

                    ✏️ Edit

                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>
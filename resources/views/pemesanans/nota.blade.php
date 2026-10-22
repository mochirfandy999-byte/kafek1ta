<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pemesanan - {{ $pemesanan->nomor_transaksi }}</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }

        body {
            background-color: #f4f6f9;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .receipt-card {
            background: #fff;
            width: 320px;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .divider {
            border-top: 1px dashed #333;
            margin: 8px 0;
        }

        .double-divider {
            border-top: 1px double #333;
            margin: 8px 0;
        }

        .info-table, .items-table {
            width: 100%;
            font-size: 12px;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 2px 0;
        }

        .items-table th {
            text-align: left;
            border-bottom: 1px dashed #333;
            padding-bottom: 4px;
        }

        .items-table td {
            padding: 4px 0;
            vertical-align: top;
        }

        .total-section {
            font-size: 13px;
            font-weight: bold;
        }

        .btn-group {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-family: Arial, sans-serif;
            cursor: pointer;
        }

        .btn-print {
            background-color: #304e3a;
            color: white;
            border: none;
        }

        .btn-back {
            background-color: #eee;
            color: #333;
            border: 1px solid #ccc;
        }

        @media print {
            body {
                background: none;
                padding: 0;
            }
            .receipt-card {
                box-shadow: none;
                width: 100%;
                padding: 0;
            }
            .btn-group {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="receipt-card">
        <div class="text-center">
            <h3 style="margin: 0; font-size: 18px;">CafeKita</h3>
            <p style="margin: 2px 0; font-size: 11px;">Jl. Kalimantan No. 12, Jember</p>
            <p style="margin: 2px 0; font-size: 11px;">Telp: 0812-3456-7890</p>
        </div>

        <div class="double-divider"></div>

        <table class="info-table">
            <tr>
                <td>No. Transaksi</td>
                <td>: {{ $pemesanan->nomor_transaksi }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $pemesanan->tanggal_transaksi ? $pemesanan->tanggal_transaksi->format('d/m/Y H:i') : now()->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>: {{ $pemesanan->user->nama ?? (auth()->user()->nama ?? 'Kasir') }}</td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>: {{ $pemesanan->nama_pelanggan }}</td>
            </tr>
            <tr>
                <td>Meja</td>
                <td>: Meja {{ $pemesanan->meja->nomor_meja ?? ($pemesanan->meja->nomor ?? '-') }}</td>
            </tr>
            @if(!empty($pemesanan->catatan))
            <tr>
                <td>Catatan</td>
                <td>: {{ $pemesanan->catatan }}</td>
            </tr>
            @endif
        </table>

        <div class="divider"></div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Harga</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($pemesanan->detailPemesanans))
                    @foreach($pemesanan->detailPemesanans as $detail)
                        <tr>
                            <td>{{ $detail->menu->nama_menu ?? ($detail->menu->nama ?? 'Menu') }}</td>
                            <td class="text-center">{{ $detail->jumlah }}</td>
                            <td class="text-end">{{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="divider"></div>

        <table class="info-table total-section">
            <tr>
                <td>TOTAL</td>
                <td class="text-end">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>STATUS</td>
                <td class="text-end" style="text-transform: uppercase;">{{ $pemesanan->status }}</td>
            </tr>
        </table>

        <div class="double-divider"></div>

        <div class="text-center" style="font-size: 11px; margin-top: 10px;">
            <p style="margin: 2px 0;">Terima Kasih Atas Kunjungan Anda!</p>
            <p style="margin: 2px 0;">Instagram: @cafekita</p>
        </div>
    </div>

    <div class="btn-group">
        <a href="{{ route('pemesanans.index') }}" class="btn btn-back">Kembali</a>
        <button onclick="window.print()" class="btn btn-print">Cetak Nota</button>
    </div>

</body>
</html>
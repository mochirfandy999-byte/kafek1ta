<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Menu - CafeKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 650px;">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">✏️ Ubah Data Menu</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kode Menu / ID Menu</label>
                    <input type="text" name="kode_menu" class="form-control" value="{{ old('kode_menu', $menu->kode_menu) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori Menu</label>
                    <select name="kategori" class="form-select" required>
                        <option value="makanan" {{ old('kategori', $menu->kategori) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="minuman" {{ old('kategori', $menu->kategori) == 'minuman' ? 'selected' : '' }}>Minuman</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" min="0" value="{{ old('harga', $menu->harga) }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary px-3">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
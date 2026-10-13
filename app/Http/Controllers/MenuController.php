<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->get();
        $totalMenu = $menus->count();
        $totalMakanan = $menus->where('kategori', 'makanan')->count();
        $totalMinuman = $menus->where('kategori', 'minuman')->count();

        return view('menus.index', compact('menus', 'totalMenu', 'totalMakanan', 'totalMinuman'));
    }

    // Form tambah menu
    public function create()
    {
        return view('menus.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_menu' => 'required|unique:menus,kode_menu|max:50',
            'nama_menu' => 'required|string|max:255',
            'kategori'  => 'required|in:makanan,minuman',
            'harga'     => 'required|numeric|min:0',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Data menu berhasil ditambahkan.');
    }

    // Form ubah menu
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // Simpan perubahan menu
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'kode_menu' => 'required|max:50|unique:menus,kode_menu,' . $menu->id,
            'nama_menu' => 'required|string|max:255',
            'kategori'  => 'required|in:makanan,minuman',
            'harga'     => 'required|numeric|min:0',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Data menu berhasil diperbarui.');
    }

    // Hapus menu
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Data menu berhasil dihapus.');
    }
}
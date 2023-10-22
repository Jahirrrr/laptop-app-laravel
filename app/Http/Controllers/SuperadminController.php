<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class SuperadminController extends Controller
{
    public function index() {
        $laptops = Laptop::all();
        return view('superadmin.index', compact('laptops'));
    }

    public function create() {
        return view('superadmin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode_laptop' => 'required|unique:laptops',
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|integer',
            'gambar' => 'required', // Menggunakan validasi untuk gambar
        ]);

        // Periksa apakah ada file yang diunggah
    if ($request->hasFile('gambar')) {
        // Menyimpan gambar ke server
        $gambarPath = $request->file('gambar')->store('uploads', 'public');
    } else {
        return redirect()->route('superadmin.create')->with('error', 'Tidak ada gambar yang diunggah.');
    }

        Laptop::create([
            'kode_laptop' => $request->kode_laptop,
            'merk' => $request->merk,
            'warna' => $request->warna,
            'harga' => $request->harga,
            'gambar' => $gambarPath, // Simpan nama file gambar dalam kolom gambar
        ]);

        

        return redirect()->route('superadmin.index')->with('success', 'Data laptop berhasil ditambahkan');
    }

    public function show($id) {
        $laptop = Laptop::find($id);
        return view('superadmin.show', compact('laptop'));
    }

    public function edit($id) {
        $laptop = Laptop::find($id);
        return view('superadmin.edit', compact('laptop'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|integer'
        ]);

        $laptop = Laptop::find($id);
        $laptop->update($request->all());
        return redirect()->route('superadmin.index')->with('success', 'Laptop berhasil diperbarui');
    }

    public function destroy($id) {
        $laptop = Laptop::find($id);
        $laptop->delete();
        return redirect()->route('superadmin.index')->with('success', 'Data Laptop berhasil dihapus');
    }
}
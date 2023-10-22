<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index() {
        $laptops = Laptop::all();
        return view('laptop.index', compact('laptops'));
    }

    public function create() {
        return view('laptop.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode_laptop' => 'required|unique:laptops',
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|intege'
        ]);

        Laptop::create($request->all());

        return redirect()->route('laptop.index')->with('success', 'Data laptop berhasil ditambahkan');
    }

    public function show($id) {
        $laptop = Laptop::find($id);
        return view('laptop.show', compact('laptop'));
    }

    public function edit($id) {
        $laptop = Laptop::find($id);
        return view('laptop.edit', compact('laptop'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'merk' => 'required',
            'warna' => 'required',
            'harga' => 'required|integer'
        ]);

        $laptop = Laptop::find($id);
        $laptop->update($request->all());
        return redirect()->route('laptop.index')->with('success', 'Laptop berhasil diperbarui');
    }

    public function destroy($id) {
        $laptop = Laptop::find($id);
        $laptop->delete();
        return redirect()->route('laptop.index')->with('success', 'Data Laptop berhasil dihapus');
    }
}
@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h2>Edit Laptop</h2>
        <form action="{{ route('laptop.update', $laptop->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_laptop">Kode Laptop</label>
                <input type="text" name="kode_laptop" class="form-control" value="{{ $laptop->kode_laptop }}" required>
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" name="merk" class="form-control" value="{{ $laptop->merk }}" required>
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" name="warna" class="form-control" value="{{ $laptop->warna }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ $laptop->harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
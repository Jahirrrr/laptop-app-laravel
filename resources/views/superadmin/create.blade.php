@extends('layouts.app')
 
@section('contents')
    <div class="container">
        <h2>Tambah Laptop</h2>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('superadmin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kode_laptop">Kode Laptop</label>
                <input type="text" name="kode_laptop" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" name="merk" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" name="warna" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control-file" accept="image/*" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

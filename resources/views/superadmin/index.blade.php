@extends('layouts.app')

@section('contents')
    <div class="container">
        <br>
        <h2>Admin Dashboard</h2>
        <br>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        <br>
        <a href="{{ route('superadmin.create') }}" class="btn btn-primary">Tambah Laptop</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Laptop</th>
                    <th>Merk</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($laptops as $laptop)
                    <tr>
                    <td>{{ $laptop->kode_laptop }}</td>
                    <td>{{ $laptop->merk }}</td>
                    <td>{{ $laptop->warna }}</td>
                    <td>{{ $laptop->harga }}</td>
                    <td>
                    <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="Laptop Image" width="100">
                    </td>
                    <td>
                            <a href="{{ route('superadmin.edit', $laptop->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('superadmin.destroy', $laptop->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laptop ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
    </div>
@endsection
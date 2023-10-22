@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h2>Data Laptop</h2>
        <a href="{{ route('laptop.create') }}" class="btn btn-primary">Tambah Laptop</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Laptop</th>
                    <th>Merk</th>
                    <th>Warna</th>
                    <th>Harga</th>
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
                            <a href="{{ route('laptop.edit', $laptop->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laptop ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
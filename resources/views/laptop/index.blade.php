@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="h4 fw-semibold text-dark mb-4">Data Laptop</h2>
    <a href="{{ route('laptop.create') }}" class="btn btn-indigo mb-4">Tambah Laptop</a>

    <!-- Input Pencarian -->
    <input type="text" id="searchInput" class="form-control mb-4" placeholder="Cari Laptop..." onkeyup="filterTable()">

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-bordered table-striped" id="laptopTable">
            <thead class="table-dark">
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
                            <a href="{{ route('laptop.edit', $laptop->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laptop ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
// Fungsi untuk menyaring data tabel berdasarkan input pencarian
function filterTable() {
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase();
    var table = document.getElementById('laptopTable');
    var tr = table.getElementsByTagName('tr');

    // Looping melalui semua baris tabel dan menyembunyikan yang tidak sesuai dengan pencarian
    for (var i = 1; i < tr.length; i++) {
        var td = tr[i].getElementsByTagName('td');
        var match = false;

        // Mencari kecocokan dalam kolom yang berbeda
        for (var j = 0; j < td.length - 1; j++) {
            if (td[j]) {
                var txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
        }

        // Menampilkan atau menyembunyikan baris berdasarkan kecocokan
        if (match) {
            tr[i].style.display = '';
        } else {
            tr[i].style.display = 'none';
        }
    }
}
</script>
@endsection

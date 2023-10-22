@extends('layouts.app')

@section('contents')
    <div class="container">
        <br>
        <h2>Daftar Produk Laptop</h2>
        <br>
        <form action="/logout" method="post" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        <form action="/cart" method="get" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-success">Keranjang</button>
        </form>
        <br> <br>
        <div class="row">
            @foreach($laptops as $laptop)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $laptop->gambar) }}" class="card-img-top" alt="Laptop Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $laptop->merk }}</h5>
                            <p class="card-text">
                                <strong>Kode Laptop:</strong> {{ $laptop->kode_laptop }}<br>
                                <strong>Warna:</strong> {{ $laptop->warna }}<br>
                                <strong>Harga:</strong> {{ $laptop->harga }}<br>
                            </p>
                            <form action="{{ route('cart.store') }}" method="GET">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $laptop->id }}">
                                <input type="number" name="quantity" value="1" min="1">
                                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

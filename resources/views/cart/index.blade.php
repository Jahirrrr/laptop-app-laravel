@extends('layouts.app')

@section('contents')
    <div class="container">
        <br>
        <h1>Keranjang Belanja</h1>
        <br>
        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                        <tr>
                        <td>
                        <img src="{{ asset('storage/' . $cartItem->product->gambar) }}" alt="Produk" style="max-width: 100px;">
                            {{ $cartItem->product->nama }}
                        </td>
                            <td>Rp {{ $cartItem->product->harga }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>Rp {{ $cartItem->product->harga * $cartItem->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total Harga: Rp {{ $totalPrice }}</p>
            <form action="{{ route('cart.confirmation') }}" method="GET" id="clear-cart-form">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary" id="clear-cart-button">Checkout Sekarang!</button>
            </form>
        @else
            <p>Keranjang Anda kosong.</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('clear-cart-form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin memesan semua item dari keranjang?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Pesan',
                cancelButtonText: 'Tidak Jadi',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lanjutkan dengan mengirimkan formulir penghapusan
                    this.submit();
                }
            });
        });
    </script>
@endsection

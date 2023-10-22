@extends('layouts.app')

@section('contents')
    <div class="container">
        <h1>Checkout</h1>
        <p>Total Harga: Rp {{ $totalPrice }}</p>

        <form action="{{ route('cart.destroy', $cartItem->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection

<?php

// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Laptop;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    $cartItems = Cart::where('user_id', auth()->id())->get();
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->product->harga * $item->quantity;
    });
    
    return view('cart.index', compact('cartItems', 'totalPrice'));
}

    public function store(Request $request)
    {
        // Validasi input

        $user = auth()->user();
        $product = Laptop::find($request->product_id);

        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function destroy()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $cartItems->delete();

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function confirmation() {
        // Dapatkan semua item keranjang yang terkait dengan pengguna saat ini
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Hapus semua item keranjang
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Produk telah berhasil dipesan!');
    }
}

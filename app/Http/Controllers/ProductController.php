<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class ProductController extends Controller
{
    public function index() {
        $laptops = Laptop::all();
        return view('product.index', compact('laptops'));
    }

    public function show($id) {
        $laptop = Laptop::find($id);
        return view('product.show', compact('laptop'));
    }
}
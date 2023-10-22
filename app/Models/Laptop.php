<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
protected $fillable = ['kode_laptop', 'merk', 'warna', 'harga', 'gambar'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // untuk memproteksi field id
    protected $guarded = ['id'];

    // untuk relasi one To Many
    public function users() {
        return $this->hasMany(User::class);
    }

}
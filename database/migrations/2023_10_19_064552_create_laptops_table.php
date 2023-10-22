<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
Schema::create('laptops', function (Blueprint $table) {
$table->id();
$table->string('kode_laptop')->unique();
$table->string('merk');
$table->string('warna');
$table->string('harga');
$table->timestamps();
});
}

};

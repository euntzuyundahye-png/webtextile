<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('kain', function (Blueprint $table) {
    $table->id();

    $table->string('kode_kain')->unique();
    $table->string('nama_kain');
    $table->string('jenis_kain');
    $table->string('warna');

    $table->integer('stok')->default(0);

    $table->decimal('harga', 15, 2);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kain');
    }
};
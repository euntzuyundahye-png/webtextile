<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kain extends Model
{
    protected $table = 'kain';

    protected $fillable = [
        'kode_kain',
        'nama_kain',
        'jenis_kain',
        'warna',
        'stok',
        'harga',
    ];

    public function stokMasuk()
{
    return $this->hasMany(
        StokMasuk::class
    );
}

public function stokKeluar()
{
    return $this->hasMany(
        StokKeluar::class
    );
}

}
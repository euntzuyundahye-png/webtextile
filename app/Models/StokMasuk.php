<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMasuk extends Model
{
    protected $table = 'stok_masuk';

    protected $fillable = [
        'kain_id',
        'user_id',
        'tanggal_masuk',
        'jumlah',
        'supplier',
        'keterangan'
    ];

    public function kain()
    {
        return $this->belongsTo(Kain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
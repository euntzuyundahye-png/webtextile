<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    protected $table = 'stok_keluar';

    protected $fillable = [
        'kain_id',
        'user_id',
        'tanggal_keluar',
        'jumlah',
        'tujuan',
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
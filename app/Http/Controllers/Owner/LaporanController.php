<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function stok()
    {
        $kains = Kain::all();

        return view(
            'owner.laporan.stok',
            compact('kains')
        );
    }

    public function stokMasuk(Request $request)
    {
        $stokMasuk = StokMasuk::with(
            ['kain','user']
        )->latest()->get();

        return view(
            'owner.laporan.stok-masuk',
            compact('stokMasuk')
        );
    }

    public function stokKeluar(Request $request)
    {
        $stokKeluar = StokKeluar::with(
            ['kain','user']
        )->latest()->get();

        return view(
            'owner.laporan.stok-keluar',
            compact('stokKeluar')
        );
    }
}
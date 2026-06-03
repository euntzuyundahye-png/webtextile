<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKain = Kain::count();

        $totalMasuk = StokMasuk::count();

        $totalKeluar = StokKeluar::count();

        $stokMenipis = Kain::where(
            'stok',
            '<=',
            10
        )->count();

        $totalStok = Kain::sum('stok');

        return view(
            'gudang.dashboard',
            compact(
                'totalKain',
                'totalMasuk',
                'totalKeluar',
                'stokMenipis',
                'totalStok'
            )
        );
    }
}
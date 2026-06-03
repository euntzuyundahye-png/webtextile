<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'owner.dashboard',
            [
                'totalKain' => Kain::count(),

                'totalStok' => Kain::sum('stok'),

                'totalMasuk' => StokMasuk::sum('jumlah'),

                'totalKeluar' => StokKeluar::sum('jumlah'),
            ]
        );
    }
}
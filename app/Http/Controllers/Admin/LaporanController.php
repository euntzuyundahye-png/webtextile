<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Laporan Stok Kain
    |--------------------------------------------------------------------------
    */

    public function stok()
    {
        $kains = Kain::orderBy(
            'nama_kain',
            'asc'
        )->get();

        return view(
            'admin.laporan.stok',
            compact('kains')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Laporan Stok Masuk
    |--------------------------------------------------------------------------
    */

    public function stokMasuk(Request $request)
    {
        $query = StokMasuk::with([
            'kain',
            'user'
        ]);

        if (
            $request->filled('tanggal_awal') &&
            $request->filled('tanggal_akhir')
        ) {

            $query->whereBetween(
                'tanggal_masuk',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }

        $stokMasuk = $query
            ->latest()
            ->get();

        return view(
            'admin.laporan.stok-masuk',
            compact('stokMasuk')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Laporan Stok Keluar
    |--------------------------------------------------------------------------
    */

    public function stokKeluar(Request $request)
    {
        $query = StokKeluar::with([
            'kain',
            'user'
        ]);

        if (
            $request->filled('tanggal_awal') &&
            $request->filled('tanggal_akhir')
        ) {

            $query->whereBetween(
                'tanggal_keluar',
                [
                    $request->tanggal_awal,
                    $request->tanggal_akhir
                ]
            );
        }

        $stokKeluar = $query
            ->latest()
            ->get();

        return view(
            'admin.laporan.stok-keluar',
            compact('stokKeluar')
        );
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokMasuk;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    public function index()
    {
        $stokMasuk = StokMasuk::with([
            'kain',
            'user'
        ])
        ->latest()
        ->get();

        return view(
            'admin.stok-masuk.index',
            compact('stokMasuk')
        );
    }

    public function create()
    {
        $kains = Kain::orderBy(
            'nama_kain',
            'asc'
        )->get();

        return view(
            'admin.stok-masuk.create',
            compact('kains')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kain_id'        => 'required|exists:kain,id',
            'tanggal_masuk'  => 'required|date',
            'jumlah'         => 'required|integer|min:1',
            'supplier'       => 'required',
            'keterangan'     => 'nullable',
        ]);

        $stokMasuk = StokMasuk::create([
            'kain_id'        => $validated['kain_id'],
            'user_id'        => auth()->id(),
            'tanggal_masuk'  => $validated['tanggal_masuk'],
            'jumlah'         => $validated['jumlah'],
            'supplier'       => $validated['supplier'],
            'keterangan'     => $request->keterangan,
        ]);

        $stokMasuk->kain->increment(
            'stok',
            $validated['jumlah']
        );

        return redirect()
            ->route('stok-masuk.index')
            ->with(
                'success',
                'Stok masuk berhasil ditambahkan'
            );
    }

    public function edit(StokMasuk $stokMasuk)
    {
        $kains = Kain::orderBy(
            'nama_kain',
            'asc'
        )->get();

        return view(
            'admin.stok-masuk.edit',
            compact(
                'stokMasuk',
                'kains'
            )
        );
    }

    public function update(
        Request $request,
        StokMasuk $stokMasuk
    ) {

        $validated = $request->validate([
            'kain_id'        => 'required|exists:kain,id',
            'tanggal_masuk'  => 'required|date',
            'jumlah'         => 'required|integer|min:1',
            'supplier'       => 'required',
            'keterangan'     => 'nullable',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Kembalikan stok lama
        |--------------------------------------------------------------------------
        */

        $stokMasuk->kain->decrement(
            'stok',
            $stokMasuk->jumlah
        );

        /*
        |--------------------------------------------------------------------------
        | Update transaksi
        |--------------------------------------------------------------------------
        */

        $stokMasuk->update([
            'kain_id'        => $validated['kain_id'],
            'tanggal_masuk'  => $validated['tanggal_masuk'],
            'jumlah'         => $validated['jumlah'],
            'supplier'       => $validated['supplier'],
            'keterangan'     => $request->keterangan,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Tambahkan stok baru
        |--------------------------------------------------------------------------
        */

        $kain = Kain::findOrFail(
            $validated['kain_id']
        );

        $kain->increment(
            'stok',
            $validated['jumlah']
        );

        return redirect()
            ->route('stok-masuk.index')
            ->with(
                'success',
                'Stok masuk berhasil diupdate'
            );
    }

    public function destroy(
        StokMasuk $stokMasuk
    ) {

        /*
        |--------------------------------------------------------------------------
        | Kurangi stok karena transaksi dihapus
        |--------------------------------------------------------------------------
        */

        $stokMasuk->kain->decrement(
            'stok',
            $stokMasuk->jumlah
        );

        $stokMasuk->delete();

        return redirect()
            ->route('stok-masuk.index')
            ->with(
                'success',
                'Stok masuk berhasil dihapus'
            );
    }
}
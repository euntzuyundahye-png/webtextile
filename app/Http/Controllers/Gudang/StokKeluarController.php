<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    public function index()
    {
        $stokKeluar = StokKeluar::with([
            'kain',
            'user'
        ])
        ->latest()
        ->get();

        return view(
            'gudang.stok-keluar.index',
            compact('stokKeluar')
        );
    }

    public function create()
    {
        $kains = Kain::orderBy(
            'nama_kain',
            'asc'
        )->get();

        return view(
            'gudang.stok-keluar.create',
            compact('kains')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kain_id'         => 'required|exists:kain,id',
            'tanggal_keluar'  => 'required|date',
            'jumlah'          => 'required|integer|min:1',
            'tujuan'          => 'required',
            'keterangan'      => 'nullable'
        ]);

        $kain = Kain::findOrFail(
            $validated['kain_id']
        );

        if ($validated['jumlah'] > $kain->stok) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Stok tidak mencukupi'
                );
        }

        StokKeluar::create([
            'kain_id'         => $validated['kain_id'],
            'user_id'         => auth()->id(),
            'tanggal_keluar'  => $validated['tanggal_keluar'],
            'jumlah'          => $validated['jumlah'],
            'tujuan'          => $validated['tujuan'],
            'keterangan'      => $request->keterangan,
        ]);

        $kain->decrement(
            'stok',
            $validated['jumlah']
        );

        return redirect()
            ->route('gudang.stok-keluar.index')
            ->with(
                'success',
                'Stok keluar berhasil disimpan'
            );
    }

    public function edit(StokKeluar $stokKeluar)
    {
        $kains = Kain::orderBy(
            'nama_kain',
            'asc'
        )->get();

        return view(
            'gudang.stok-keluar.edit',
            compact(
                'stokKeluar',
                'kains'
            )
        );
    }

    public function update(
        Request $request,
        StokKeluar $stokKeluar
    ) {

        $validated = $request->validate([
            'kain_id'         => 'required|exists:kain,id',
            'tanggal_keluar'  => 'required|date',
            'jumlah'          => 'required|integer|min:1',
            'tujuan'          => 'required',
            'keterangan'      => 'nullable'
        ]);

        $stokKeluar->kain->increment(
            'stok',
            $stokKeluar->jumlah
        );

        $kain = Kain::findOrFail(
            $validated['kain_id']
        );

        if ($validated['jumlah'] > $kain->stok) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Stok tidak mencukupi'
                );
        }

        $stokKeluar->update([
            'kain_id'         => $validated['kain_id'],
            'tanggal_keluar'  => $validated['tanggal_keluar'],
            'jumlah'          => $validated['jumlah'],
            'tujuan'          => $validated['tujuan'],
            'keterangan'      => $request->keterangan,
        ]);

        $kain->decrement(
            'stok',
            $validated['jumlah']
        );

        return redirect()
            ->route('gudang.stok-keluar.index')
            ->with(
                'success',
                'Stok keluar berhasil diupdate'
            );
    }

    public function destroy(
        StokKeluar $stokKeluar
    ) {

        $stokKeluar->kain->increment(
            'stok',
            $stokKeluar->jumlah
        );

        $stokKeluar->delete();

        return redirect()
            ->route('gudang.stok-keluar.index')
            ->with(
                'success',
                'Stok keluar berhasil dihapus'
            );
    }
}
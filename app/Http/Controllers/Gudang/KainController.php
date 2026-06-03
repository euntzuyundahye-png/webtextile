<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use Illuminate\Http\Request;

class KainController extends Controller
{
    public function index()
    {
        $kains = Kain::orderBy('id')->get();

        return view(
            'gudang.kain.index',
            compact('kains')
        );
    }

    public function create()
    {
        return view(
            'gudang.kain.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kain'  => 'required',
            'jenis_kain' => 'required',
            'warna'      => 'required',
            'stok'       => 'required|integer|min:0',
            'harga'      => 'required|numeric|min:0',
        ]);

        Kain::create([
            'kode_kain'  => 'TEMP',
            'nama_kain'  => $validated['nama_kain'],
            'jenis_kain' => $validated['jenis_kain'],
            'warna'      => $validated['warna'],
            'stok'       => $validated['stok'],
            'harga'      => $validated['harga'],
        ]);

        $this->refreshKodeKain();

        return redirect()
            ->route('gudang.kain.index')
            ->with(
                'success',
                'Data kain berhasil ditambahkan'
            );
    }

    public function edit(Kain $kain)
    {
        return view(
            'gudang.kain.edit',
            compact('kain')
        );
    }

    public function update(
        Request $request,
        Kain $kain
    ) {

        $validated = $request->validate([
            'nama_kain'  => 'required',
            'jenis_kain' => 'required',
            'warna'      => 'required',
            'stok'       => 'required|integer|min:0',
            'harga'      => 'required|numeric|min:0',
        ]);

        $kain->update([
            'nama_kain'  => $validated['nama_kain'],
            'jenis_kain' => $validated['jenis_kain'],
            'warna'      => $validated['warna'],
            'stok'       => $validated['stok'],
            'harga'      => $validated['harga'],
        ]);

        $this->refreshKodeKain();

        return redirect()
            ->route('gudang.kain.index')
            ->with(
                'success',
                'Data kain berhasil diupdate'
            );
    }

    public function destroy(Kain $kain)
    {
        $kain->delete();

        $this->refreshKodeKain();

        return redirect()
            ->route('gudang.kain.index')
            ->with(
                'success',
                'Data kain berhasil dihapus'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | AUTO GENERATE ULANG KODE KAIN
    |--------------------------------------------------------------------------
    */

    private function refreshKodeKain()
    {
        $kains = Kain::orderBy('id')->get();

        foreach ($kains as $index => $kain) {

            $kain->update([
                'kode_kain' => 'KAIN-' .
                    str_pad(
                        $index + 1,
                        3,
                        '0',
                        STR_PAD_LEFT
                    )
            ]);

        }
    }
}
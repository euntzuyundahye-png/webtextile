<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kain;
use Illuminate\Http\Request;

class KainController extends Controller
{
    public function index()
    {
        $kains = Kain::latest()->get();

        return view(
            'admin.kain.index',
            compact('kains')
        );
    }

    public function create()
    {
        return view('admin.kain.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kain'  => 'required|unique:kain,kode_kain',
            'nama_kain'  => 'required',
            'jenis_kain' => 'required',
            'warna'      => 'required',
            'stok'       => 'required|integer|min:0',
            'harga'      => 'required|numeric|min:0',
        ]);

        Kain::create($validated);

        return redirect()
            ->route('kain.index')
            ->with(
                'success',
                'Data kain berhasil ditambahkan'
            );
    }

    public function edit(Kain $kain)
    {
        return view(
            'admin.kain.edit',
            compact('kain')
        );
    }

    public function update(
        Request $request,
        Kain $kain
    ) {

        $validated = $request->validate([
            'kode_kain'  => 'required|unique:kain,kode_kain,' . $kain->id,
            'nama_kain'  => 'required',
            'jenis_kain' => 'required',
            'warna'      => 'required',
            'stok'       => 'required|integer|min:0',
            'harga'      => 'required|numeric|min:0',
        ]);

        $kain->update($validated);

        return redirect()
            ->route('kain.index')
            ->with(
                'success',
                'Data kain berhasil diupdate'
            );
    }

    public function destroy(Kain $kain)
    {
        $kain->delete();

        return redirect()
            ->route('kain.index')
            ->with(
                'success',
                'Data kain berhasil dihapus'
            );
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;
use App\Models\DonasiTerima;
use App\Models\DonasiPenyaluran;

class StokBarangController extends Controller
{
    public function index()
    {   
        $donasiTerimas = DonasiTerima::all();
        $donasiPenyalurans = DonasiPenyaluran::all();
        $stokBarangs = StokBarang::all();
        return view('stok_barangs.index', compact('stokBarangs','donasiPenyalurans','donasiTerimas'));
    }

    public function create()
    {
        // Ambil data yang dibutuhkan untuk dropdown
        $donasiTerimas = DonasiTerima::all();
        $donasiPenyalurans = DonasiPenyaluran::all();

        return view('stok_barangs.create', compact('donasiTerimas', 'donasiPenyalurans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donasi_terima_id' => 'required',
            'donasi_penyaluran_id' => 'required',
            'stok' => 'required',
        ]);

        StokBarang::create($request->all());

        return redirect()->route('stok_barangs.index')
            ->with('success', 'Data stok barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $stokBarang = StokBarang::findOrFail($id);
        return view('stok_barangs.show', compact('stokBarang'));
    }

    public function edit($id)
    {
        $stokBarang = StokBarang::findOrFail($id);
        $donasiTerimas = DonasiTerima::all();
        $donasiPenyalurans = DonasiPenyaluran::all();

        return view('stok_barangs.edit', compact('stokBarang', 'donasiTerimas', 'donasiPenyalurans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'donasi_terima_id' => 'required',
            'donasi_penyaluran_id' => 'required',
            'stok' => 'required',
        ]);

        $stokBarang = StokBarang::findOrFail($id);
        $stokBarang->update($request->all());

        return redirect()->route('stok_barangs.index')
            ->with('success', 'Data stok barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stokBarang = StokBarang::findOrFail($id);
        $stokBarang->delete();

        return redirect()->route('stok_barangs.index')
            ->with('success', 'Data stok barang berhasil dihapus.');
    }
}

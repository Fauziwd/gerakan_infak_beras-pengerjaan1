<?php

namespace App\Http\Controllers;

use App\Models\Pesantren;
use App\Exports\PesantrensExport;
use App\Imports\PesantrensImport;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class PesantrenController extends Controller
{
    public function index()
    {
        $pesantrens = Pesantren::all();
        return view('pesantrens.index', compact('pesantrens'));
    }

    public function create()
    {
        return view('pesantrens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_santri_putera' => 'required|integer',
            'jumlah_santri_puteri' => 'required|integer',
            'jumlah_muallim' => 'required|integer',
            'jatah_beras' => 'required',
        ]);

        Pesantren::create($request->all());

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil ditambahkan.');
    }

    public function edit(Pesantren $pesantren)
    {
        return view('pesantrens.edit', compact('pesantren'));
    }

    public function update(Request $request, Pesantren $pesantren)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_santri_putera' => 'required|integer',
            'jumlah_santri_puteri' => 'required|integer',
            'jumlah_muallim' => 'required|integer',
            'jatah_beras' => 'required',
        ]);

        $pesantren->update($request->all());

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil diperbarui.');
    }

    public function destroy(Pesantren $pesantren)
    {
        $pesantren->delete();

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil dihapus.');
    }

    public function show(Pesantren $pesantren)
    {
        return view('pesantrens.show', compact('pesantren'));
    }

    public function export()
    {
        return Excel::download(new PesantrensExport, 'pesantrens.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new PesantrensImport, $request->file('file'));

        return redirect()->route('pesantrens.index')->with('success', 'Data pesantren berhasil diimport.');
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    $pesantrens = Pesantren::where('nama', 'like', '%' . $search . '%')
        ->orWhere('alamat', 'like', '%' . $search . '%')
        ->orWhere('jatah_beras', 'like', '%' . $search . '%')
        ->orWhere('jumlah_santri_putera', 'like', '%' . $search . '%')
        ->orWhere('jumlah_santri_puteri', 'like', '%' . $search . '%')
        ->orWhere('jumlah_muallim', 'like', '%' . $search . '%')
        ->get();

    return view('pesantrens.index', compact('pesantrens'));
}

}

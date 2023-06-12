<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonasiPenyaluran;
use App\Exports\DonasiPenyaluransExport;
use App\Imports\DonasiPenyaluransImport;

use App\Models\Anggota;
use App\Models\Pesantren;

use Maatwebsite\Excel\Facades\Excel;

class DonasiPenyaluranController extends Controller
{
    public function index()
    {
        $donasiPenyalurans = DonasiPenyaluran::all();
        return view('donasi_penyalurans.index', compact('donasiPenyalurans'));
    }

    public function create()
    {   
        $anggotas = Anggota::all();
        $pesantrens = Pesantren::all();
        return view('donasi_penyalurans.create', compact('anggotas','pesantrens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'pesantren_id' => 'required',
            'donasi_diterima' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        DonasiPenyaluran::create($request->all());

        return redirect()->route('donasi_penyalurans.index')
            ->with('success', 'Donasi penyaluran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $donasiPenyaluran = DonasiPenyaluran::findOrFail($id);
        return view('donasi_penyalurans.show', compact('donasiPenyaluran'));
    }

    public function edit($id)
    {   
        $anggotas = Anggota::all();
        $pesantrens = Pesantren::all();
        $donasiPenyaluran = DonasiPenyaluran::findOrFail($id);
        return view('donasi_penyalurans.edit', compact('donasiPenyaluran','pesantrens','anggotas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anggota_id' => 'required',
            'pesantren_id' => 'required',
            'donasi_diterima' => 'required',
            'tanggal_penyaluran' => 'required',
        ]);

        $donasiPenyaluran = DonasiPenyaluran::findOrFail($id);
        $donasiPenyaluran->update($request->all());

        return redirect()->route('donasi_penyalurans.index')
            ->with('success', 'Donasi penyaluran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $donasiPenyaluran = DonasiPenyaluran::findOrFail($id);
        $donasiPenyaluran->delete();

        return redirect()->route('donasi_penyalurans.index')
            ->with('success', 'Donasi penyaluran berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new DonasiPenyaluransExport, 'donasiPenyalurans.xlsx');
    }

    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new DonasiPenyaluransImport, $request->file('file'));

        return redirect()->route('donasi_penyalurans.index')->with('success', 'Data Penerimaan donasi berhasil diimport.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $donasiPenyalurans = DonasiPenyaluran::where(function ($query) use ($search) {
            $query->where('donasi_diterima', 'LIKE', '%' . $search . '%')
                ->orWhere('tanggal_penyaluran', 'LIKE', '%' . $search . '%')
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama_anggota', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('pesantren', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', '%' . $search . '%');
                });
        })->with('anggota', 'pesantren')->get();
    
        return view('donasi_penyalurans.index', compact('donasiPenyalurans'));
    }
    

}

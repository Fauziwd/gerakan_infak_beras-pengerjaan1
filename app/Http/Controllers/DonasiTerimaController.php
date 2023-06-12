<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ota;
use App\Models\DonasiTerima;
use App\Exports\DonasiTerimasExport;
use App\Imports\DonasiTerimasImport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class DonasiTerimaController extends Controller
{
    public function index()
    {   
        $donasiTerimas = DonasiTerima::all();

        return view('donasi_terimas.index', compact('donasiTerimas'));
    }

    public function create()
    {   
        $donasiTerimas = DonasiTerima::all();
        $anggotas = Anggota::all();
        $otas = Ota::all();
        return view('donasi_terimas.create', compact('donasiTerimas','anggotas','otas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ota_id' => 'required',
            'anggota_id' => 'required',
            'jumlah_donasi' => 'required',
            'tanggal_donasi' => 'required',
        ]);

        DonasiTerima::create($request->all());

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil ditambahkan.');
    }

    public function show($id)
    {
        $donasiTerima = DonasiTerima::findOrFail($id);
        return view('donasi_terimas.show', compact('donasiTerima'));
    }

    public function edit($id)
    {
        $anggotas = Anggota::all();
        $otas = Ota::all();
        $donasiTerima = DonasiTerima::findOrFail($id);
        return view('donasi_terimas.edit', compact('donasiTerima', 'anggotas', 'otas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ota_id' => 'required',
            'jumlah_donasi' => 'required',
            'tanggal_donasi' => 'required',
        ]);

        $donasiTerima = DonasiTerima::findOrFail($id);
        $donasiTerima->update($request->all());

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $donasiTerima = DonasiTerima::findOrFail($id);
        $donasiTerima->delete();

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new DonasiTerimasExport, 'donasiTerimas.xlsx');
    }

    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new DonasiTerimasImport, $request->file('file'));

        return redirect()->route('donasi_terimas.index')->with('success', 'Data Penerimaan donasi berhasil diimport.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $donasiTerimas = DonasiTerima::where(function ($query) use ($search) {
            $query->where('jumlah_donasi', 'LIKE', "%$search%")
                ->orWhere('tanggal_donasi', 'LIKE', "%$search%")
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama_anggota', 'LIKE', "%$search%");
                })
                ->orWhereHas('ota', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', "%$search%");
                });
        })->with('anggota', 'ota')->get()->sortBy(function ($donasiTerima) {
            return $donasiTerima->anggota->nama_anggota;
        });
    
        return view('donasi_terimas.index', compact('donasiTerimas'));
    }
    
}

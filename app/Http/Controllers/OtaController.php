<?php

namespace App\Http\Controllers;

use App\Models\Ota;
use App\Exports\OtasExport;
use App\Imports\OtasImport;

use App\Models\Anggota;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class OtaController extends Controller
{
    public function index()
    {
        $otas = Ota::all();
        return view('otas.index', compact('otas'));
    }

    public function show($id)
    {
        $otas = Ota::findOrFail($id);
        return view('otas.show', compact('otas'));
    }
    
    
    public function create()
    {
        $anggotas = Anggota::pluck('nama_anggota', 'id');
        return view('otas.create', compact('anggotas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'anggota_id' => 'required',
        ]);
        
        Ota::create($request->all());
        
        return redirect()->route('otas.index')->with('success', 'Data Otas berhasil ditambahkan.');

    }
    
    public function edit($id)
    {  
        $anggotas = Anggota::all();
        $otas = Ota::findOrFail($id);
        return view('otas.edit', compact('otas','anggotas'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'anggota_id' => 'required',
        ]);
    
        $otas = Ota::findOrFail($id);
        $otas->update($request->all());
    
        return redirect()->route('otas.index')
            ->with('success', 'Data Otas berhasil diperbarui.');
    }   
    
    public function destroy(Ota $ota)
    {
        $ota->delete();
    
        return redirect()->route('otas.index')
            ->with('success', 'Data Otas berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new OtasExport, 'otas.xlsx');
    }

    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new OtasImport, $request->file('file'));

        return redirect()->route('otas.index')->with('success', 'Data ota berhasil diimport.');
    }
    public function search(Request $request)
{
    $search = $request->input('search');
    
    $otas = Ota::where('nama', 'like', "%$search%")
        ->orWhere('pekerjaan', 'like', "%$search%")
        ->orWhere('alamat', 'like', "%$search%")
        ->orWhere('nomor_hp', 'like', "%$search%")
        ->orWhereHas('anggota', function ($query) use ($search) {
            $query->where('nama_anggota', 'like', "%$search%");
        })
        ->get();

    return view('otas.index', compact('otas'));
}

}

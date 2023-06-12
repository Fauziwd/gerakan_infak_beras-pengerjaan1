<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Ota;
use App\Models\Pesantren;
use App\Models\DonasiTerima;
use App\Models\DonasiPenyaluran;
use App\Models\StokBarang;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   //kontiributor
        $anggotas = Anggota::all();
        $otas = Ota::all();
        $pesantrens = Pesantren::all();
        
        //resources
        $donasiTerimas = DonasiTerima::all();
        $donasiPenyalurans = DonasiPenyaluran::all();
        $stokBarangs = StokBarang::all();
        return view('home', compact('anggotas','otas','pesantrens','donasiTerimas','donasiPenyalurans'));
    }
}

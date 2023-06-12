<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\OtaController;
use App\Http\Controllers\PesantrenController;
use App\Http\Controllers\DonasiTerimaController;
use App\Http\Controllers\DonasiPenyaluranController;
use App\Http\Controllers\StokBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('anggotas', AnggotaController::class);
    Route::get('/anggotas-search', [AnggotaController::class, 'search'])->name('anggotas.search');
    Route::get('anggotas-export', [AnggotaController::class, 'export'])->name('anggotas.export');
    Route::post('anggotas-import', [AnggotaController::class, 'import'])->name('anggotas.import');

    Route::resource('otas', OtaController::class);
    Route::get('/otas-search', [OtaController::class, 'search'])->name('otas.search');
    Route::get('otas-export', [OtaController::class, 'export'])->name('otas.export');
    Route::post('otas-import', [OtaController::class, 'import'])->name('otas.import');

    Route::resource('pesantrens', PesantrenController::class);
    Route::get('/pesantrens-search', [PesantrenController::class, 'search'])->name('pesantrens.search');
    Route::get('pesantrens-export', [PesantrenController::class, 'export'])->name('pesantrens.export');
    Route::post('pesantrens-import', [PesantrenController::class, 'import'])->name('pesantrens.import');


    Route::resource('donasi_terimas', DonasiTerimaController::class);
    Route::get('/donasi_terimas-search', [DonasiTerimaController::class, 'search'])->name('donasi_terimas.search');
    Route::get('donasi_terimas-export', [DonasiTerimaController::class, 'export'])->name('donasi_terimas.export');
    Route::post('donasi_terimas-import', [DonasiTerimaController::class, 'import'])->name('donasi_terimas.import');

    Route::resource('donasi_penyalurans', DonasiPenyaluranController::class);
    Route::get('/donasi_penyalurans-search', [DonasiPenyaluranController::class, 'search'])->name('donasi_penyalurans.search');
    Route::get('donasi_penyalurans-export', [DonasiPenyaluranController::class, 'export'])->name('donasi_penyalurans.export');
    Route::post('donasi_penyalurans-import', [DonasiPenyaluranController::class, 'import'])->name('donasi_penyalurans.import');


    Route::resource('stok_barangs', StokBarangController::class);


});

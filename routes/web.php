<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\StockController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::get('/supplier', [SupplierController::class,'index']);
Route::get('/supplier/create', [SupplierController::class, 'create']);
Route::resource('supplier', SupplierController::class);

Route::get('/pegawai', [PegawaiController::class,'index']);
Route::get('/pegawai/create', [PegawaiController::class, 'create']);
Route::resource('pegawai', PegawaiController::class);

Route::get('/pengembalian', [PengembalianController::class,'index']);
Route::get('/pengembalian/create', [PengembalianController::class, 'create']);
Route::resource('pengembalian', PengembalianController::class);

Route::get('/penerimaan', [PenerimaanController::class,'index']);
Route::get('/penerimaan/create', [PenerimaanController::class, 'create']);
Route::resource('penerimaan', PenerimaanController::class);

Route::get('/transaksi', [TransaksiController::class,'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::resource('transaksi', TransaksiController::class);

Route::get('/pengambilan', [PengambilanController::class,'index']);
Route::get('/pengambilan/create', [PengambilanController::class, 'create']);
Route::resource('pengambilan', PengambilanController::class);

Route::get('/stock', [StockController::class,'index']);
Route::get('/stock/create', [StockController::class, 'create']);
Route::resource('stock', StockController::class);


Route::get('/abcmodel', function () {
    return view('abcmodel');
});

Route::get('/prediksi', function () {
    return view('prediksi');
});

Route::get('/sparepart', function () {
    return view('sparepart');
});

Route::get('/sparepart/create', function () {
    return view('createsparepart');
});

Route::get('/sparepart/edit', function () {
    return view('editsparepart');
});

Route::get('/monitoring', function () {
    return view('monitoring');
});

Route::get('/logout', function(){
    \Auth::logout();
    return redirect ('/');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/tambah_data', function () {
    return view('tambah_data');
});

Route::get('/pengambilan', function () {
    return view('pengambilan');
});

Route::get('/penerimaan', function () {
    return view('penerimaan');
});

Route::get('/monitoring', function () {
    return view('monitoring');
});

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/master_pegawai', function () {
    return view('master_pegawai');
});

Route::get('/tambah_data_pengambilan', function () {
    return view('tambah_data_pengambilan');
});

Route::get('/tambah_data_pegawai', function () {
    return view('tambah_data_pegawai');
});

Route::get('/tambah_data_penerimaan', function () {
    return view('tambah_data_penerimaan');
});

Route::get('/tambah_data_stock', function () {
    return view('tambah_data_stock');
});

Route::get('/tambah_data_supplier', function () {
    return view('tambah_data_supplier');
});

Route::get('/edit_data', function () {
    return view('edit_data');
});

Route::get('/edit_data_pegawai', function () {
    return view('edit_data_pegawai');
});

Route::get('/edit_data_supplier', function () {
    return view('edit_data_supplier');
});

Route::get('/edit_data_stock', function () {
    return view('edit_data_stock');
});

Route::get('/edit_data_pengambilan', function () {
    return view('edit_data_pengambilan');
});

Route::get('/edit_data_penerimaan', function () {
    return view('edit_data_penerimaan');
});

Route::get('/master_supplier', function () {
    return view('master_supplier');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/return', function () {
    return view('return');
});

Route::get('/tambah_data_return', function () {
    return view('tambah_data_return');
});

Route::get('/edit_data_return', function () {
    return view('edit_data_return');
});

Route::get('/logout', function(){
    \Auth::logout();
    return redirect ('/');
});
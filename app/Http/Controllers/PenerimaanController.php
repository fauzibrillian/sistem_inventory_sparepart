<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\penerimaan;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaan = DB::table('penerimaan')
        ->leftJoin('pegawai','penerimaan.pegawai_id','=','pegawai.id')
        ->leftJoin('supplier','penerimaan.supplier_id','=','supplier.id')
        ->leftJoin('transaksi','penerimaan.transaksi_id','=','transaksi.id')
        ->select('penerimaan.*', 'pegawai.nama_pegawai', 'supplier.nama_supplier', 'transaksi.nama_sparepart', 'transaksi.kode_sparepart','transaksi.kode_transaksi')
        ->get();
        return view('penerimaan', ['penerimaan' => $penerimaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table('pegawai')->get();
        $supplier = DB::table('supplier')->get();
        $transaksi = DB::table('transaksi')->get();
        return view('createpenerimaan',['pegawai'=>$pegawai, 'supplier'=>$supplier, 'transaksi'=>$transaksi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = $request->get('tanggal');
        $nama_sparepart = $request->get('nama_sparepart');
        $kode_sparepart = $request->get('kode_sparepart');
        $merk = $request->get('merk');
        $qty =$request->get('qty');
        $pegawai =$request->get('pegawai_id');
        $supplier =$request->get('supplier_id');
        $transaksi =$request->get('transaksi_id');
        /* Menyimpan data kedalam tabel */
        $save_penerimaan = new \App\Models\penerimaan;
        $save_stock = new \App\Models\stock;
        $save_stock->nama_sparepart = $nama_sparepart;
        $save_stock->kode_sparepart = $kode_sparepart;
        $save_stock->qty = $qty;
        $save_stock->merk = $merk;
        $save_penerimaan->tanggal = $tanggal;
        $save_penerimaan->nama_sparepart = $nama_sparepart;
        $save_penerimaan->kode_sparepart = $kode_sparepart;
        $save_penerimaan->merk = $merk;
        $save_penerimaan->qty = $qty;
        $save_penerimaan->pegawai_id = $pegawai;
        $save_penerimaan->supplier_id = $supplier;
        $save_penerimaan->transaksi_id = $transaksi;
        $save_penerimaan->save();
        $save_stock->save();
        return redirect('penerimaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerimaan $penerimaan)
    {
        $pegawai = DB::table('pegawai')->get();
        $supplier = DB::table('supplier')->get();
        $transaksi = DB::table('transaksi')->get();
        return view('editpenerimaan',[
        'penerimaan'=>$penerimaan,
        'pegawai'=>$pegawai,
        'supplier'=>$supplier,
        'transaksi'=>$transaksi ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        $data = $request->all();
        $penerimaan->update($data);

        return redirect()->route('penerimaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();

        return redirect()->route('penerimaan.index');
    }

    public function search_penerimaan(Request $request, Penerimaan $penerimaan)
    {
        $searchTerm = $request->input('search_penerimaan');
        
        $penerimaan = penerimaan::where('kode_sparepart', 'LIKE', '%' . $searchTerm . '%')->get();

        
        return view('penerimaan', ['penerimaan' => $penerimaan]);
    }
}

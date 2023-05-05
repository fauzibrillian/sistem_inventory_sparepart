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
        ->select('penerimaan.*', 'pegawai.nama_pegawai')
        ->get();
        $supplier = DB::table('penerimaan')
        ->leftJoin('supplier','penerimaan.supplier_id','=','supplier.id')
        ->select('penerimaan.*', 'supplier.nama_supplier')
        ->get();
        return view('penerimaan', ['penerimaan' => $penerimaan, 'supplier'=> $supplier]);
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
        return view('createpenerimaan',['pegawai'=>$pegawai, 'supplier'=>$supplier]);
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
        $nopol =$request->get('nopol');
        $pegawai =$request->get('pegawai_id');
        $supplier =$request->get('supplier_id');
        /* Menyimpan data kedalam tabel */
        $save_penerimaan = new \App\Models\penerimaan;
        $save_penerimaan->tanggal = $tanggal;
        $save_penerimaan->nama_sparepart = $nama_sparepart;
        $save_penerimaan->kode_sparepart = $kode_sparepart;
        $save_penerimaan->merk = $merk;
        $save_penerimaan->nopol = $nopol;
        $save_penerimaan->pegawai = $pegawai;
        $save_penerimaan->supplier = $supplier;
        $save_penerimaan->save();
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
    public function edit($id)
    {
        $pegawai = DB::table('pegawai')->get();
        $supplier = DB::table('supplier')->get();
        return view('editpenerimaan',[
        'penerimaan'=>$penerimaan,
        'pegawai'=>$pegawai,
        'supplier'=>$supplier ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $penerimaan->delete();

        return redirect()->route('penerimaan.index');
    }
}

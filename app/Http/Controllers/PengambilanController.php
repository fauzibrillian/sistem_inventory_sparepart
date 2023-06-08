<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pengambilan;

class PengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengambilan = DB::table('pengambilan')
        ->leftJoin('pegawai','pengambilan.pegawai_id','=','pegawai.id')
        ->leftJoin('transaksi','pengambilan.transaksi_id','=','transaksi.id')
        ->select('pengambilan.*', 'pegawai.nama_pegawai','transaksi.nama_sparepart', 'transaksi.kode_sparepart')
        ->get();
        return view('pengambilan', ['pengambilan' => $pengambilan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table('pegawai')->get();
        $transaksi = DB::table('transaksi')->get();
        return view('createpengambilan',['pegawai'=>$pegawai, 'transaksi'=>$transaksi]);
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
        $qty = $request->get('qty');
        $nopol = $request->get('nopol');
        $pegawai =$request->get('pegawai_id');
        $transaksi =$request->get('transaksi_id');
        /* Menyimpan data kedalam tabel */
        $save_pengambilan = new \App\Models\pengambilan;
        $save_pemakaian = new \App\Models\pemakaian;
        $save_pemakaian->nama_sparepart = $nama_sparepart;
        $save_pemakaian->kode_sparepart = $kode_sparepart;
        $save_pemakaian->qty = $qty;
        $save_pemakaian->merk = $merk;
        $save_pengambilan->tanggal = $tanggal;
        $save_pengambilan->nama_sparepart = $nama_sparepart;
        $save_pengambilan->kode_sparepart = $kode_sparepart;
        $save_pengambilan->merk = $merk;
        $save_pengambilan->nopol = $nopol;
        $save_pengambilan->qty = $qty;
        $save_pengambilan->pegawai_id = $pegawai;
        $save_pengambilan->save();
        $save_pemakaian->save();
        return redirect('pengambilan');
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
    public function edit( Pengambilan $pengambilan )
    {
        $pegawai = DB::table('pegawai')->get();
        $transaksi = DB::table('transaksi')->get();
        return view('editpengambilan',[
        'pengambilan'=>$pengambilan,
        'pegawai'=>$pegawai,
        'transaksi'=>$transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengambilan $pengambilan)
    {
        $data = $request->all();
        $pengambilan->update($data);

        return redirect()->route('pengambilan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengambilan $pengambilan)
    {
        $pengambilan->delete();

        return redirect()->route('pengambilan.index');
    }

    public function search_pengambilan(Request $request, Pengambilan $pengambilan)
    {
        $searchTerm = $request->input('search_pengambilan');

        $pengambilan = pengambilan::where('kode_sparepart', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('pengambilan', ['pengambilan' => $pengambilan]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pengembalian;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = DB::table('pengembalian')
        ->leftJoin('pegawai','pengembalian.pegawai_id','=','pegawai.id')
        ->leftJoin('transaksi','pengembalian.transaksi_id','=','transaksi.id')
        ->select('pengembalian.*', 'pegawai.nama_pegawai','transaksi.nama_sparepart','transaksi.kode_sparepart','transaksi.merk', 'transaksi.kode_transaksi')
        ->get();
        return view('pengembalian', ['pengembalian' => $pengembalian]);
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
        return view('createpengembalian',['pegawai'=>$pegawai,'transaksi'=>$transaksi]);
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
        $qty = $request->get('qty');
        $harga = $request->get('harga');
        $merk = $request->get('merk');
        $nopol =$request->get('nopol');
        $pegawai =$request->get('pegawai_id');
        $transaksi =$request->get('transaksi_id');
        $ket =$request->get('ket');
        /* Menyimpan data kedalam tabel */
        $save_pengembalian = new \App\Models\pengembalian;
        $save_pengembalian->tanggal = $tanggal;
        $save_pengembalian->nama_sparepart = $nama_sparepart;
        $save_pengembalian->kode_sparepart = $kode_sparepart;
        $save_pengembalian->qty = $qty;
        $save_pengembalian->harga = $harga;
        $save_pengembalian->merk = $merk;
        $save_pengembalian->nopol = $nopol;
        $save_pengembalian->pegawai_id = $pegawai;
        $save_pengembalian->transaksi_id = $transaksi;
        $save_pengembalian->ket = $ket;
        $save_pengembalian->save();
        return redirect('pengembalian');
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
    public function edit( Pengembalian $pengembalian)
    {
        $pegawai = DB::table('pegawai')->get();
        $transaksi = DB::table('transaksi')->get();
        return view('editpengembalian',[
        'pengembalian'=>$pengembalian,
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
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $data = $request->all();
        $pengembalian->update($data);

        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('pengembalian.index');
    }

    public function search_pengembalian(Request $request, Pengembalian $pengembalian)
    {
        $searchTerm = $request->input('search_pengembalian');

        $pengembalian = pengembalian::where('kode_transaksi', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('pengembalian', ['pengembalian' => $pengembalian]);
    }
}

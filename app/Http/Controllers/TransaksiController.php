<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transaksi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('transaksi')
        ->leftJoin('supplier','transaksi.supplier_id','=','supplier.id')
        ->select('transaksi.*', 'supplier.nama_supplier')
        ->get();
        return view('transaksi', ['transaksi' => $transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = DB::table('supplier')->get();
        return view('createtransaksi',['supplier'=>$supplier]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {   
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'kode_transaksi' => 'required',
            'nama_sparepart' => 'required',
            'kode_sparepart' => 'required',
            'qty' => 'required|numeric',
            'merk' => 'required',
            'harga' => 'required|numeric',
            'supplier_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect('transaksi')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tanggal = $request->get('tanggal');
        $kode_transaksi = $request->get('kode_transaksi');
        $nama_sparepart = $request->get('nama_sparepart');
        $kode_sparepart = $request->get('kode_sparepart');
        $qty = $request->get('qty');
        $merk = $request->get('merk');
        $harga = $request->get('harga');
        $supplier =$request->get('supplier_id');
        /* Menyimpan data kedalam tabel */
        $save_transaksi = new \App\Models\transaksi;
        $save_transaksi->tanggal = $tanggal;
        $save_transaksi->kode_transaksi = $kode_transaksi;
        $save_transaksi->nama_sparepart = $nama_sparepart;
        $save_transaksi->kode_sparepart = $kode_sparepart;
        $save_transaksi->qty = $qty;
        $save_transaksi->harga = $harga;
        $save_transaksi->merk = $merk;
        $save_transaksi->supplier_id = $supplier;
        $save_transaksi->save();

        Session::flash('success', 'Data berhasil disimpan!');
        Session::flash('error', 'Coba cek kelengkapan data anda!!!');
        return redirect('transaksi');
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
    public function edit( Transaksi $transaksi )
    {
        $supplier = DB::table('supplier')->get();
        return view('edittransaksi',[
        'transaksi'=>$transaksi,
        'supplier'=>$supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'kode_transaksi' => 'required',
            'nama_sparepart' => 'required',
            'kode_sparepart' => 'required',
            'qty' => 'required|numeric',
            'merk' => 'required',
            'harga' => 'required|numeric',
            'supplier_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect('transaksi')
                        ->withErrors($validator)
                        ->withInput();
        }
        Session::flash('success', 'Data berhasil disimpan!');
        Session::flash('error', 'Coba cek kelengkapan data anda!!!');
        $data = $request->all();
        $transaksi->update($data);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index');
    }

    public function search_transaksi(Request $request, Transaksi $transaksi)
    {
        $searchTerm = $request->input('search_transaksi');

        $transaksi = transaksi::where('kode_transaksi', 'LIKE', '%' . $searchTerm . '%')->get();
        
        return view('transaksi', ['transaksi' => $transaksi]);
    }
}
